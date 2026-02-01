<?php
class UploadPortofolioController {

    public function index() {
        $role = $_SESSION['agent_role'] ?? 'guest';
        if ($role == 'agent') echo "<script>window.location.href = 'index.php?page=dashboardAgent';</script>";
        else echo "<script>window.location.href = 'index.php?page=login';</script>";
        
        include 'views/layout/uploadPortofolio.php';
    }
}