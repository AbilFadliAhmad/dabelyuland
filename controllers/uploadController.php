<?php
class UploadController {
    public function index() {
    $role = $_SESSION['agent_role'] ?? 'guest';

    // Check Role
    if ($role == 'guest') echo "<script>window.location.href = 'index.php?page=login';</script>";
    else if ($role == 'admin') echo "<script>window.location.href = 'index.php?page=dashboardAdmin';</script>";

    $action = $_GET['action'] ?? 'index';
    $isEdit = $_GET['edit'] ?? false;
    $propertyId = $_GET['property_id'] ?? null;

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
            $property = '';
            if ($isEdit && $propertyId) $property = $model->getProperty($propertyId);
            // Buat draft kosong untuk mendapatkan ID
            $propertyId = $model->createDraft(); 
            var_dump('hama: ', $property);
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
                // echo "<script>alert('Properti berhasil disimpan!'); window.location='index.php';</>";
                echo "<script>alert('Properti berhasil disimpan!'); window.location='index.php?page=upload';</script>";
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