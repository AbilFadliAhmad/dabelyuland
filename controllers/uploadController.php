<?php
class UploadController {
    public function index() {
    $action = $_GET['action'] ?? 'index';

    switch ($action) {
        case 'async_upload':
            $this->asyncUpload(); // Handle upload foto satuan
            break;
        case 'store':
            $this->store(); // Finalisasi data (update title, price, dll)
            break;
        default:
            require_once 'models/uploadModel.php';
            $model = new UploadModel();
            // Buat draft kosong untuk mendapatkan ID
            $propertyId = $model->createDraft(); 
            include 'views/layout/upload.php';
            break;
    }
}

    private function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'models/uploadModel.php';
            $model = new UploadModel();
            // 4. Kirim ke Model
            $success = $model->finalizeProperty($_POST);

            if ($success) {
                echo "<script>alert('Properti berhasil disimpan!'); window.location='index.php';</script>";
            } else {
                echo "Gagal menyimpan data ke database.";
            }
        }
    }

        public function asyncUpload() {
        if (!isset($_FILES['image'])) return;

        require_once 'models/uploadModel.php';
        $model = new UploadModel();
        
        // Gunakan logic path yang kita bahas sebelumnya
        $baseDir = dirname(__DIR__) . '/public/uploads/';

        // Cek jika folder 'public/uploads' belum ada, maka buat otomatis
        if (!is_dir($baseDir)) {
            mkdir($baseDir, 0777, true);
        }

        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newName = uniqid('prop_', true) . '.' . $ext;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $baseDir . $newName)) {
            $path = 'public/uploads/' . $newName;
            $data = $model->insertSingleImage($_POST['property_id'], $path, $_POST['is_main'], $_POST['urutan']);
            return $data;
        }
        exit; // Pastikan berhenti agar tidak render HTML
    }
}