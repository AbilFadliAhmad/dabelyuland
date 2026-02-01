<?php
class PropertyController {
    public function index() {
        require_once 'models/propertyModel.php';
        $model = new PropertyModel();

        // Tangkap data dari URL
        $filters = [
            'search' => $_GET['search'] ?? '',
            'harga'  => $_GET['harga'] ?? 'Semua Harga',
            'tipe'   => $_GET['tipe'] ?? 'Semua Properti'
        ];

        $properties = $model->getAllProperty($filters);

        // Kirim $properties dan $filters ke view
        include 'views/layout/property.php';
    }
}