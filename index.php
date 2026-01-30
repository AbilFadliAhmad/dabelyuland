<?php 
require_once 'config/database.php';

// Router sederhana
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;
?>

<!DOCTYPE html>
<html lang="id">
  <link rel="icon" type="image/png" href="public/images/dabelyu.png" />
<link rel="stylesheet" href="./public/css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
 <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dabelyuland Indonesia</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#135bec",
              "primary-dark": "#0f4bc2",
              "background-light": "#f6f6f8",
              "background-dark": "#101622",
              "surface-light": "#ffffff",
              "surface-dark": "#1a2332",
              "text-main": "#0d121b",
              "text-muted": "#4c669a",
              "border-light": "#e7ebf3",
              "border-dark": "#2a3441",
            },
            fontFamily: {
              display: ["Inter", "sans-serif"],
            },
            borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", "2xl": "1rem", full: "9999px" },
          },
        },
      };
    </script>
    <style>
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      .icon-filled {
        font-variation-settings:
          "FILL" 1,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  </head>
<body class="bg-gray-50 dark:bg-gray-900">
    <?php include 'views/templates/navbar.php'; ?>

    <!-- KONTEN -->
    <?php 
    if ($page == 'home') {
        require_once 'controllers/homeController.php';
        $controller = new HomeController();
        $controller->index(); 
    } else if ($page == 'detail') {
      require_once 'controllers/detailController.php';
      $controller = new DetailController();
      $controller->index();
    } else if ($page == 'upload') {
      require_once 'controllers/uploadController.php';
      $controller = new UploadController();
      $controller->index();
    } else if ($page == 'map') {
      var_dump('ini map lho ya');
      require_once 'controllers/getLocation.php';
      $controller = new LocationController();
      $controller->getLocation();
    }
    // Tambahkan route lain di sini
    ?>

<!-- Footer -->
    <?php include 'views/templates/footer.php'; ?>
</body>
</html>