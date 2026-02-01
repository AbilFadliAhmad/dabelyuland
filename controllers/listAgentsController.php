<?php
class ListAgentsController {
    public function index() {

        $role = $_SESSION['agent_role'] ?? 'guest';
        if ($role == 'agent') echo "<script>window.location.href = 'index.php?page=dashboardAgent';</script>";
        else echo "<script>window.location.href = 'index.php?page=login';</script>";

        // 5. Panggil View (variabel $property akan bisa diakses di file detail.php)
        include 'views/layout/listAgents.php';
    }
}