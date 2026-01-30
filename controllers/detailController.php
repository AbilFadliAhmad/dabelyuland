<?php
class DetailController {
    public function index() {
        // Memanggil Model Home
        require_once 'models/detailModel.php';
        // $model = new HomeModel();
        // $data['produk'] = $model->getAllProduk();

        // Panggil View Utama
        include 'views/layout/detail.php';
    }
}