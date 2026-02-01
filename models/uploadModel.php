<?php
class UploadModel {
    private $db;

    public function __construct() {
        global $db; // Pastikan ini adalah instance PDO
        $this->db = $db;
    }

    // Fungsi untuk membuat draft properti kosong
    public function createDraft() {
        try {
            // Kita buat record dengan status 'draft'
            // Pastikan tabel properties Anda memiliki kolom 'status'
            $agent_id = $_SESSION['agent_id'];
            $sql = "INSERT INTO properties (title, status, agent_id) VALUES ('Draft Properti', 'draft', $agent_id)";
            $this->db->prepare($sql)->execute();
            
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            return false;
        }
    }

    // Fungsi untuk insert gambar satu per satu (AJAX)
    public function insertSingleImage($propertyId, $path, $isPrimary, $urutan) {
        try {
            $sql = "INSERT INTO property_images (property_id, image_url, is_primary, urutan) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$propertyId, $path, $isPrimary, $urutan]);
            return true; 
        } catch (Exception $e) {
            return false;
        }
    }

    // Fungsi final untuk update data draft menjadi publik
    public function finalizeProperty($data) {
        try {
            $this->db->beginTransaction();

            // 1. Cari ID Kategori berdasarkan nama (Kantor, Gudang, dll)
            $sqlCat = "SELECT id FROM categories WHERE name = :cat_name LIMIT 1";
            $stmtCat = $this->db->prepare($sqlCat);
            $stmtCat->execute([':cat_name' => $data['category']]);
            $category = $stmtCat->fetch(PDO::FETCH_ASSOC);
            
            // Gunakan ID yang ditemukan, atau NULL jika tidak ditemukan
            $categoryId = $category ? $category['id'] : null;

            // 2. Update data utama properti (Termasuk category_id)
            $sqlProp = "UPDATE properties SET 
                        category_id = :category_id,
                        title = :title, 
                        price = :price, 
                        bedrooms = :bedrooms, 
                        bathrooms = :bathrooms, 
                        building_area = :building_area,
                        description = :description,
                        status = 'pending' 
                        WHERE id = :id";
            
            $stmt = $this->db->prepare($sqlProp);
            $stmt->execute([
                ':category_id'   => $categoryId, // ID hasil pencarian tadi
                ':title'         => $data['title'],
                ':price'         => $data['price'] ?? 0,
                ':bedrooms'      => (!empty($data['bedrooms'])) ? $data['bedrooms'] : 0,
                ':bathrooms'     => (!empty($data['bathrooms'])) ? $data['bathrooms'] : 0,
                ':building_area' => (!empty($data['building_area'])) ? $data['building_area'] : 0,
                ':description'   => $data['description'],
                ':id'            => $data['property_id']
            ]);

            // 3. Insert/Update Lokasi
            $sqlLoc = "INSERT INTO locations (property_id, city, district, address_detail, latitude, longitude) 
                    VALUES (?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE 
                    city=VALUES(city), 
                    district=VALUES(district), 
                    address_detail=VALUES(address_detail),
                    latitude=VALUES(latitude),
                    longitude=VALUES(longitude)";
            $this->db->prepare($sqlLoc)->execute([
                $data['property_id'], 
                $data['city'], 
                $data['district'], 
                $data['address_detail'], 
                $data['latitude'], 
                $data['longitude']
            ]);

            // 4. Insert Fasilitas
            if (isset($data['facility_label'])) {
                // Hapus fasilitas lama dulu agar tidak duplikat saat edit/finalize ulang
                $this->db->prepare("DELETE FROM property_facilities WHERE property_id = ?")
                        ->execute([$data['property_id']]);

                $sqlFac = "INSERT INTO property_facilities (property_id, icon_name, facility_label) VALUES (?, ?, ?)";
                $stmtFac = $this->db->prepare($sqlFac);
                foreach ($data['facility_label'] as $key => $label) {
                    if (!empty($label)) {
                        // Ambil ikon sesuai index jika ada
                        $icon = $data['facility_icon'][$key] ?? '';
                        $stmtFac->execute([$data['property_id'], $icon, $label]);
                    }
                }
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
        $this->db->rollBack();
            error_log($e->getMessage()); // Simpan error ke log untuk debugging
            return false;
        }
    }

}