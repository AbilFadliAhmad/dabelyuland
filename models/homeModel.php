<?php
class HomeModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getAllProperty() {
        try {
            // Query JOIN untuk menggabungkan 3 tabel
            // Kita filter hanya yang statusnya 'published' agar draft tidak muncul di home
            $sql = "SELECT 
                        p.*, 
                        l.city, l.district, l.address_detail,
                        i.image_url
                    FROM properties p
                    LEFT JOIN locations l ON p.id = l.property_id
                    LEFT JOIN property_images i ON p.id = i.property_id AND i.is_primary = 1
                    WHERE p.status = 'published'
                    ORDER BY p.created_at DESC";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}