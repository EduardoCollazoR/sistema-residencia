<?php
 require_once 'sesion.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Residencias profesionales">
    <title>ITT - Sistemas de residencias profesionales.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css?v=<?php echo time(); ?>">

    <!-- Font-icon css-->
    <script src="https://kit.fontawesome.com/291c7d6873.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../images/favicon.ico" />
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">RESIDENCIAS PROFESIONALES</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"> </a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       <!-- User Menu-->
       <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fas fa-user-graduate fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="config.php"><i class="fas fa-user-cog fa-lg"></i>Configuracion</a></li>
            <li><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-lg"></i>Cerrar Sesion</a></li>
          </ul>
        </li>
</ul>
    </header>
<?php require_once 'nav.php'; ?>