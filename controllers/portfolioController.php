<?php
class PortfolioController {
    public function index() {
        // 1. Panggil Model
        require_once 'models/homeModel.php';
        $model = new HomeModel();

        // 2. Ambil data properti
        $properties = $model->getAllProperty();

        // 3. Kirim data ke View (menggunakan include)
        // Variabel $properties akan otomatis bisa diakses di file home.php
        include 'views/layout/portfolio.php';
    }
}