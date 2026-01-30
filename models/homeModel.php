<?php
class HomeModel {
    private $db;

    public function __construct() {
        global $db; // Harus sama dengan nama variabel di database.php
        $this->db = $db;
    }

    // READ: Tambahan fungsi untuk mengambil semua data (untuk isi tabel)
    public function getAllProduk() {
        $query = "SELECT * FROM produk";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(); // Method PDO untuk mengambil semua data
    }

    // CREATE: Menambahkan produk baru
    public function insertProduk($data) {
        $query = "INSERT INTO produk (nama_barang, kategori, stok, harga) 
                  VALUES (:nama_barang, :kategori, :stok, :harga)";
        
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute([
            ':nama_barang' => $data['nama_barang'],
            ':kategori'    => $data['kategori'],
            ':stok'        => $data['stok'],
            ':harga'       => $data['harga']
        ]);
    }

    // UPDATE: Memperbarui data produk berdasarkan ID
    public function updateProduk($data) {
        $query = "UPDATE produk SET 
                    nama_barang = :nama_barang, 
                    kategori = :kategori, 
                    stok = :stok, 
                    harga = :harga 
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute([
            ':nama_barang' => $data['nama_barang'],
            ':kategori'    => $data['kategori'],
            ':stok'        => $data['stok'],
            ':harga'       => $data['harga'],
            ':id'          => $data['id']
        ]);
    }

    // DELETE: Menghapus produk berdasarkan ID
    public function deleteProduk($id) {
        $query = "DELETE FROM produk WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}