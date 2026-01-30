<?php
class UploadModel {
    private $db;

    public function __construct() {
        global $db; // Pastikan ini adalah instance PDO
        $this->db = $db;
    }

    public function insertProperty($data, $images) {
        try {
            $this->db->beginTransaction();

            // 1. Insert ke tabel Properties
            $sqlProp = "INSERT INTO properties (title, slug, price, bedrooms, bathrooms, building_area) 
                        VALUES (:title, :slug, :price, :bedrooms, :bathrooms, :building_area)";
            $stmt = $this->db->prepare($sqlProp);
            $stmt->execute([
                ':title'         => $data['title'],
                ':slug'          => $data['slug'],
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