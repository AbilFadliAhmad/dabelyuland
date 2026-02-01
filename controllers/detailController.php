<?php
class DetailController {
    public function index() {
        // 1. Ambil title/name dari URL (misal: index.php?page=detail&name=Villa Keren)
        $title = $_GET['name'] ?? '';

        if (empty($title)) {
            header('Location: index.php'); // Redirect jika nama kosong
            exit;
        }

        // 2. Panggil Model
        require_once 'models/detailModel.php';
        $model = new DetailModel();

        // 3. Ambil data properti berdasarkan nama
        $property = $model->getPropertyByName($title);
        // var_dump('property kuy', $property);

        // 4. Jika data tidak ditemukan
        if (!$property) {
            echo "Properti tidak ditemukan.";
            exit;
        }

        // 5. Panggil View (variabel $property akan bisa diakses di file detail.php)
        include 'views/layout/detail.php';
    }
}