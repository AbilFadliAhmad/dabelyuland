<?php
class PropertyModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    // public function getAllProperty() {
    //     try {
    //         // Query JOIN untuk menggabungkan 4 tabel (properties, locations, images, categories)
    //         $sql = "SELECT 
    //                     p.*, 
    //                     l.city, l.district, l.address_detail,
    //                     i.image_url,
    //                     c.name AS category_name
    //                 FROM properties p
    //                 LEFT JOIN locations l ON p.id = l.property_id
    //                 LEFT JOIN property_images i ON p.id = i.property_id AND i.is_primary = 1
    //                 LEFT JOIN categories c ON p.category_id = c.id
    //                 WHERE p.status = 'published'
    //                 ORDER BY p.created_at DESC";

    //         $stmt = $this->db->prepare($sql);
    //         $stmt->execute();
            
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         // Gunakan error_log di production, var_dump hanya untuk debugging lokal
    //         error_log($e->getMessage());
    //         die("Error: Terjadi masalah saat mengambil data properti.");
    //     }
    // }

    public function getAllProperty($filters = []) {
    try {
        $sql = "SELECT p.*, l.city, l.district, l.address_detail, i.image_url, c.name AS category_name
                FROM properties p
                LEFT JOIN locations l ON p.id = l.property_id
                LEFT JOIN property_images i ON p.id = i.property_id AND i.is_primary = 1
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.status = 'published'";

        $params = [];

        // 1. Filter Nama/Lokasi (Search)
        if (!empty($filters['search'])) {
            $sql .= " AND (p.title LIKE :search OR l.city LIKE :search OR l.district LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }

        // 2. Filter Tipe/Kategori
        if (!empty($filters['tipe']) && $filters['tipe'] !== 'Semua Properti') {
            $sql .= " AND c.name = :tipe";
            $params[':tipe'] = $filters['tipe'];
        }

        // 3. Filter Harga (Logika berdasarkan label dropdown Anda)
        if (!empty($filters['harga']) && $filters['harga'] !== 'Semua Harga') {
            if ($filters['harga'] === '< 500 Juta') {
                $sql .= " AND p.price < 500000000";
            } elseif ($filters['harga'] === '500 Juta - 1 M') {
                $sql .= " AND p.price BETWEEN 500000000 AND 1000000000";
            } elseif ($filters['harga'] === '> 1 Miliar') {
                $sql .= " AND p.price > 1000000000";
            }
        }

        $sql .= " ORDER BY p.created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
}