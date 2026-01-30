<?php 
require_once 'config/database.php';

// Router sederhana
$page = isset($_GET['page']) ? $_GET['page'] : 'product';
$action = isset($_GET['action']) ? $_GET['action'] : null;
?>

<!DOCTYPE html>
<html lang="id">
<link rel="stylesheet" href="./public/css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Barang - Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
</head>
<body x-data="{ open: false, showModal: false }" class="bg-gray-50 dark:bg-gray-900">
    <?php include 'views/templates/navbar.php'; ?>

    <!-- KONTEN -->
    <?php 
    if ($page == 'product') {
        require_once 'controllers/product.php';
        $controller = new ProductController();
        if ($action == 'store') {
            $controller->store(); // Jalankan fungsi simpan
            exit; // Hentikan script agar tidak muncul HTML di bawahnya
        } elseif ($action == 'edit') {
            $controller->edit(); // Jalankan fungsi edit
            exit;
        } elseif ($action == 'delete') {
            $controller->delete(); // Jalankan fungsi edit
            exit;
        }
         else {
            $controller->index(); 
        }
    } 
    // Tambahkan route lain di sini
    ?>

<!-- Footer -->
    <?php include 'views/templates/footer.php'; ?>
</body>
</html>