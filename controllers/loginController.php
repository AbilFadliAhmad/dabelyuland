<?php
class LoginController {
    private $model;

    public function __construct() {
        require_once 'models/loginModel.php';
        $this->model = new LoginModel();
    }

    public function index() {
        // Check Role
        $role = $_SESSION['agent_role'] ?? '';
        if ($role == 'admin') echo "<script>window.location.href = 'index.php?page=dashboardAdmin';</script>";
        else if ($role == 'agent') echo "<script>window.location.href = 'index.php?page=upload';</script>";

        // Mendapatkan aksi dari URL (login atau register)
        $action = $_GET['action'] ?? '';
        
        // Cek jika ada request POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($action === 'login') {
                $this->loginAgent();
            } elseif ($action === 'register') {
                $this->registerAgent();
            }
        }

        include 'views/layout/login.php';
    }

    public function loginAgent() {
        $email = $_POST['email'] ?? '';
        $pass  = $_POST['password'] ?? '';

        $agent = $this->model->getAgentByEmail($email);
        if ($agent && password_verify($pass, $agent['password'])) {
            // Jika sukses, buat session
            $_SESSION['agent_id'] = $agent['id'];
            $_SESSION['agent_name'] = $agent['name'];
            $_SESSION['agent_role'] = $agent['role'];
            
            if($agent['role'] == 'admin') echo "<script>alert('Berhasil kang'); window.location.href='index.php?page=dashboardAdmin';</script>";
            else echo "<script>alert('Berhasil kang'); window.location.href='index.php?page=upload';</script>";
            exit;
        } else {
            echo "<script>alert('Email atau Password salah!');</script>";
            include 'views/layout/login.php';
            exit;
        }
    }

    public function registerAgent() {
        // Validasi konfirmasi sandi sederhana
        if ($_POST['sandi'] !== $_POST['konfirmasi_sandi']) {
            echo "<script>alert('Konfirmasi sandi tidak cocok');</script>";
            die;
            }
            
            // Cek apakah email sudah terdaftar
        if ($this->model->getAgentByEmail($_POST['email'])) {
            echo "<script>alert('Email sudah digunakan!');</script>";
            die;
            }
            
        $data = $this->model->register($_POST);

        if ($data) {
            $_SESSION['agent_id'] = $data['id'];
            $_SESSION['agent_name'] = $data['name'];
            $_SESSION['agent_role'] = 'agent';
            echo "<script>alert('Akun berhasil didaftarkan!'); window.location.href = 'index.php?page=upload';</script>";
            exit;
        } else {
            "<script>alert('Akun gagal didaftarkan!');</script>";
        }
    }
}