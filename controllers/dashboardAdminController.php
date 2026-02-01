<?php
class DashboardAdminController {
    private $model;

    public function __construct() {
        require_once 'models/dashboardAdminModel.php';
        $this->model = new DashboardAdminModel();
    }

    public function index() {

        $role = $_SESSION['agent_role'] ?? '';
        if ($role == 'agent') echo "<script>window.location.href = 'index.php?page=dashboardAdmin';</script>";
        else if ($role == 'agent') echo "<script>window.location.href = 'index.php?page=upload';</script>";

        // Tangkap parameter status, default adalah 'all'
        $statusFilter = $_GET['status'] ?? 'all';

        // Ambil data properti yang sudah difilter
        $properties = $this->model->getAllProperties($statusFilter);
        
        // Ambil data statistik untuk card status
        $counts = $this->model->getCounts();

        // var_dump($properties);
        // var_dump($counts);

        // Kirim data ke view
        include 'views/layout/dashboardAdmin.php';
    }
}