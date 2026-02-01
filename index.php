<?php 
require_once 'config/database.php';
session_start();

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
    <style type="text/tailwindcss">
      .hide-scrollbar::-webkit-scrollbar {
        display: none;
      }
      .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }
      .property-card {
        min-width: 320px;
        max-width: 320px;
      }
      @media (min-width: 1024px) {
        .property-card {
          min-width: calc((100% / 4) - 18px);
          max-width: calc((100% / 4) - 18px);
        }
      }
      @keyframes fadeIn {
          from { opacity: 0; transform: translateY(10px); }
          to { opacity: 1; transform: translateY(0); }
      }
      .animate-fade-in {
          animation: fadeIn 0.5s ease forwards;
      }
    </style>
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
      }body {
        font-family: "Inter", sans-serif;
      }
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      .filled-icon {
        font-variation-settings: "FILL" 1;
      }

      .lightbox-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(8px); /* Membuat belakang buram */
        z-index: 9999;
        justify-content: center;
        align-items: center;
      }

      .lightbox-content {
        display: flex;
        align-items: center;
        gap: 20px;
        width: 90%;
        max-width: 600px;
      }

      .main-photo-wrapper {
        flex-grow: 1;
        aspect-ratio: 1 / 1; /* Memaksa ukuran 1:1 */
        overflow: hidden;
        border-radius: 12px;
        background-color: #000;
      }

      .main-photo-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Crop gambar agar memenuhi kotak */
      }

      .nav-btn {
        background: white;
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        flex-shrink: 0;
      }

      .nav-btn:hover {
        background: #f1f5f9;
        transform: scale(1.1);
      }

      .close-lightbox {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 40px;
        background: none;
        border: none;
        cursor: pointer;
      }
      .scale-in-center {
        animation: scale-in-center 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
      }
      @keyframes scale-in-center {
        0% {
          transform: scale(0);
          opacity: 1;
        }
        100% {
          transform: scale(1);
          opacity: 1;
        }
      }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  </head>
<body class="bg-gray-50 dark:bg-gray-900">
  
    <?php if (isset($page) && $page !== 'upload'): 
    include 'views/templates/navbar.php'; 
endif; ?>

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
    } else if ($page == 'portofolio') {
      require_once 'controllers/portfolioController.php';
      $controller = new PortfolioController();
      $controller->index();
    } else if ($page == 'listPortofolios') {
      require_once 'controllers/listPortofoliosController.php';
      $controller = new ListPortofoliosController();
      $controller->index();
    } else if ($page == 'uploadPortofolio') {
      require_once 'controllers/uploadPortofolioController.php';
      $controller = new UploadPortofolioController();
      $controller->index();
    } else if ($page == 'detailPortofolio') {
      require_once 'controllers/detailPortofolioController.php';
      $controller = new DetailPortofolioController();
      $controller->index();
    } else if ($page == 'property') {
      require_once 'controllers/propertyController.php';
      $controller = new PropertyController();
      $controller->index();
    } else if ($page == 'login') {
      require_once 'controllers/loginController.php';
      $controller = new LoginController();
      $controller->index();
    } else if ($page == 'dashboardAdmin') {
      require_once 'controllers/dashboardAdminController.php';
      $controller = new DashboardAdminController();
      $controller->index();
    } else if ($page == 'dashboardAgent') {
      require_once 'controllers/dashboardAgentController.php';
      $controller = new DashboardAgentController();
      $controller->index();
    } else if ($page == 'listAgents') {
      require_once 'controllers/listAgentsController.php';
      $controller = new ListAgentsController();
      $controller->index();
    } 
    // Tambahkan route lain di sini
    ?>

<!-- Footer -->
    <?php if (isset($page) && $page !== 'upload'): 
    include 'views/templates/footer.php'; 
endif; ?>
</body>
</html>