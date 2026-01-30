<?php 
$dsn = "mysql:host=localhost;dbname=db_dabelyuland";
try {
    $db = new PDO($dsn, "root", ""); // Menggunakan $db
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi Gagal: " . $e->getMessage());
}