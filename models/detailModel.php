<?php
class DetailModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getPropertyByName($title) {
        try {
            // Kita gunakan urutan gambar dan filter status published
            $sql = "SELECT p.*, l.city, l.district, l.address_detail, l.latitude, l.longitude
                    FROM properties p
                    LEFT JOIN locations l ON p.id = l.property_id
                    WHERE p.title = :title AND p.status = 'published'
                    LIMIT 1";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([':title' => $title]);
            $property = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($property) {
                // Ambil semua gambar terkait properti ini
                $sqlImg = "SELECT image_url, is_primary FROM property_images 
                           WHERE property_id = :id ORDER BY urutan ASC";
                $stmtImg = $this->db->prepare($sqlImg);
                $stmtImg->execute([':id' => $property['id']]);
                $property['images'] = $stmtImg->fetchAll(PDO::FETCH_ASSOC);

                // Ambil semua fasilitas terkait properti ini
                $sqlFac = "SELECT icon_name, facility_label FROM property_facilities 
                           WHERE property_id = :id";
                $stmtFac = $this->db->prepare($sqlFac);
                $stmtFac->execute([':id' => $property['id']]);
                $property['facilities'] = $stmtFac->fetchAll(PDO::FETCH_ASSOC);
            }

            return $property;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}