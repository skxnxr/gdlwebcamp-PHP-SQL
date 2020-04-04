<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>WC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GDL</b>WebCamp</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="nav-item ">
            <a id="dropdownSubMenu1" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Hola: <?php echo " " . $_SESSION['nombre']; ?> 
              <span class="pull-right-container espacio">
              <i class="fa fa-gears fa-2x pull-right"></i>
            </span>
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li class="espacioBarra"><a href="editar-admin.php?id=<?php echo $_SESSION['id']; ?>" class="dropdown-item">Ajustes de su cuenta </a></li>
              <li class="espacioBarra"><a href="login.php?cerrar_sesion=true" class="dropdown-item">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </nav>
  </header>

  <!-- =============================================== -->