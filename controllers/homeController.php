<?php
class HomeController {
    public function index() {
        // Memanggil Model Home
        require_once 'models/homeModel.php';
        // $model = new HomeModel();
        // $data['produk'] = $model->getAllProduk();

        // Panggil View Utama
        include 'views/layout/home.php';
    }
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'models/homeModel.php';
            $model = new HomeModel();
            
            // Mengirim data POST ke model
            $success = $model->insertProduk($_POST);
            
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit;
        }
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'models/homeModel.php';
            $model = new HomeModel();
            
            $success = $model->updateProduk($_POST);
            
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit;
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'models/homeModel.php';
            $model = new HomeModel();
            
            // Pastikan ID tersedia
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $success = $model->deleteProduk($id);
            
            header('Content-Type: application/json');
            echo json_encode(['success' => $success]);
            exit;
        }
    }
}