<?php
class UploadController {
    public function index() {
        // Tentukan action berdasarkan URL, defaultnya adalah 'index' (tampilan form)
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        switch ($action) {
            case 'store':
                $this->store(); // Jalankan fungsi simpan data
                break;
            default:
                include 'views/layout/upload.php';
                break;
        }
    }

    private function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'models/uploadModel.php';
            $model = new UploadModel();

            // 1. Tentukan Path Absolut untuk upload
            // dirname(__DIR__) membawa kita dari folder 'controllers' ke root project
            $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

            // Cek jika folder 'public/uploads' belum ada, maka buat otomatis
            if (!is_dir($baseDir)) {
                mkdir($baseDir, 0777, true);
            }

            // 2. Olah Slug dari Title
            $title = $_POST['title'];
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
            $_POST['slug'] = $slug;

            // 3. Olah Upload Gambar
            $uploadedImages = [];
            if (isset($_FILES['images'])) {
                $files = $_FILES['images'];
                for ($i = 0; $i < count($files['name']); $i++) {
                    if ($files['error'][$i] === 0) {
                        $ext = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                        $newName = uniqid('prop_', true) . '.' . $ext;
                        
                        // Path fisik untuk proses pemindahan file (server-side)
                        $physicalTarget = $baseDir . $newName;
                        
                        if (move_uploaded_file($files['tmp_name'][$i], $physicalTarget)) {
                            // Simpan path relatif ke DB agar mudah dipanggil di <img src="..."> (client-side)
                            $uploadedImages[] = $newName;
                        }
                    }
                }
            }


            // 4. Kirim ke Model
            $success = $model->insertProperty($_POST, $uploadedImages);

            if ($success) {
                echo "<script>alert('Properti berhasil disimpan!'); window.location='index.php';</script>";
            } else {
                echo "Gagal menyimpan data ke database.";
            }
        }
    }
}