<?php 
// $dsn = "mysql:host=localhost;dbname=db_dabelyuland";
// try {
//     $db = new PDO($dsn, "root", ""); // Menggunakan $db
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// } catch (PDOException $e) {
//     die("Koneksi Gagal: " . $e->getMessage());
// }

// Contoh koneksi PDO untuk InfinityFree
$host     = 'localhost'; // Ambil dari MySQL Hostname tadi
$db_name  = 'db_dabelyuland'; // Nama lengkap database Anda
$username = 'root';             // MySQL Username Anda
$password = '';             // Password Hosting Anda

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}