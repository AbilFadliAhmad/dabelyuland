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
            $sql = "INSERT INTO properties (title, status) VALUES ('Draft Properti', 'draft')";
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

            // 1. Update data utama properti dan ubah status menjadi 'published'
            $sqlProp = "UPDATE properties SET 
                        title = :title, 
                        slug = :slug, 
                        price = :price, 
                        bedrooms = :bedrooms, 
                        bathrooms = :bathrooms, 
                        building_area = :building_area,
                        status = 'published' 
                        WHERE id = :id";
            
            $stmt = $this->db->prepare($sqlProp);
            $stmt->execute([
                ':title'         => $data['title'],
                ':slug'          => $data['slug'],
                ':price'         => $data['price'],
                ':bedrooms'      => $data['bedrooms'],
                ':bathrooms'     => $data['bathrooms'],
                ':building_area' => $data['building_area'],
                ':id'            => $data['property_id']
            ]);

            // 2. Insert/Update Lokasi
            $sqlLoc = "INSERT INTO locations (property_id, city, district, address_detail, latitude, longitude) 
                       VALUES (?, ?, ?, ?, ?, ?)
                       ON DUPLICATE KEY UPDATE city=VALUES(city), district=VALUES(district)";
            $this->db->prepare($sqlLoc)->execute([
                $data['property_id'], $data['city'], $data['district'], $data['address_detail'], $data['latitude'], $data['longitude']
            ]);

            // 3. Insert Fasilitas
            if (isset($data['facility_label'])) {
                $sqlFac = "INSERT INTO facilities (property_id, icon, label) VALUES (?, ?, ?)";
                $stmtFac = $this->db->prepare($sqlFac);
                foreach ($data['facility_label'] as $key => $label) {
                    if (!empty($label)) {
                        $stmtFac->execute([$data['property_id'], $data['facility_icon'][$key], $label]);
                    }
                }
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function insertProperty($data, $images) {
        try {
            $this->db->beginTransaction();

            // 1. Insert ke tabel Properties
            $sqlProp = "INSERT INTO properties (title price, bedrooms, bathrooms, building_area) 
                        VALUES (:title, :price, :bedrooms, :bathrooms, :building_area)";
            $stmt = $this->db->prepare($sqlProp);
            $stmt->execute([
                ':title'         => $data['title'],
                ':price'         => $data['price'],
                ':bedrooms'      => $data['bedrooms'],
                ':bathrooms'     => $data['bathrooms'],
                ':building_area' => $data['building_area']
            ]);
            $propertyId = $this->db->lastInsertId();

            // 2. Insert ke tabel Locations
            $sqlLoc = "INSERT INTO locations (property_id, city, district, address_detail, latitude, longitude) 
                       VALUES (?, ?, ?, ?, ?, ?)";
            $this->db->prepare($sqlLoc)->execute([
                $propertyId, $data['city'], $data['district'], $data['address_detail'], $data['latitude'], $data['longitude']
            ]);

            // 3. Insert Fasilitas (Looping)
            if (isset($data['facility_label'])) {
                $sqlFac = "INSERT INTO property_facilities (property_id, icon_name, facility_label) VALUES (?, ?, ?)";
                $stmtFac = $this->db->prepare($sqlFac);
                foreach ($data['facility_label'] as $key => $label) {
                    if (!empty($label)) {
                        $stmtFac->execute([$propertyId, $data['facility_icon'][$key], $label]);
                    }
                }
            }

            // 4. Insert Gambar (Looping)
            $sqlImg = "INSERT INTO property_images (property_id, image_url) VALUES (?, ?)";
            $stmtImg = $this->db->prepare($sqlImg);
            foreach ($images as $url) {
                $stmtImg->execute([$propertyId, $url]);
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            var_dump('errorkang', $e);
            $this->db->rollBack();
            return false;
        }
    }
}