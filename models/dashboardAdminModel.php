<?php
class DashboardAdminModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getAllProperties($status = 'all') {
        // Query dasar: Langsung kecualikan 'draft' sejak awal
        $sql = "SELECT * FROM properties WHERE status != 'draft'";
        $params = [];

        // Jika filter spesifik dipilih (selain 'all' dan bukan 'draft')
        if ($status !== 'all' && in_array($status, ['published', 'pending'])) {
            $sql .= " AND status = :status";
            $params[':status'] = $status;
        }

        $sql .= " ORDER BY created_at DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCounts() {
        // Sesuaikan perhitungan agar 'total' hanya menjumlahkan 'pending' + 'published'
        $sql = "SELECT 
                    COUNT(CASE WHEN status != 'draft' THEN 1 END) as total,
                    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
                    SUM(CASE WHEN status = 'published' THEN 1 ELSE 0 END) as published
                FROM properties";
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}