<?php
class DashboardAgentController {
    private $model;

    public function __construct() {
        require_once 'models/dashboardAdminModel.php';
        $this->model = new DashboardAdminModel();
    }

    public function index() {

        $role = $_SESSION['agent_role'] ?? 'guest';
        if ($role == 'admin') echo "<script>window.location.href = 'index.php?page=dashboardAdmin';</script>";
        else echo "<script>window.location.href = 'index.php?page=login';</script>";

        include 'views/layout/dashboardAgent.php';
    }
}