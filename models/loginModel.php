<?php
class LoginModel {
    private $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    // Mencari agent berdasarkan email
    public function getAgentByEmail($email) {
        $sql = "SELECT * FROM agents WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menyimpan agent baru ke database
    public function register($data) {
        $sql = "INSERT INTO agents (name, whatsapp_number, email, password) 
                VALUES (:name, :whatsapp, :email, :password)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            ':name'     => $data['nama'],
            ':whatsapp' => $data['whatsapp'],
            ':email'    => $data['email'],
            ':password' => password_hash($data['sandi'], PASSWORD_DEFAULT)
        ]);

        if ($result) {
            // Ambil ID yang baru saja di-insert
            $lastId = $this->db->lastInsertId();
            
            // Kembalikan data untuk kebutuhan session
            return [
                'id'   => $lastId,
                'name' => $data['nama'],
                'role' => 'agent' // Karena ini tabel agents, rolenya default agent
            ];
        }
        
        return false;
    }
}