<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // Definir archivo para cachear (puede ser .php también)
	$archivoCache = 'cache/'.$pagina.'.php';
	// Cuanto tiempo deberá estar este archivo almacenado
	$tiempo = 36000;
	// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
	if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
   	include($archivoCache);
    	exit;
	}
	// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	ob_start();
?>
<!doctype html>
<html class="no-js" lang="es">

<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="theme-color" content="#fe4918">
<meta name="apple-mobile-web-app-status-bar-style" content="#fe4918">
<title>GDLWebCamp</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- <link rel="stylesheet" href="css/normalize.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" integrity="sha256-WAgYcAck1C1/zEl5sBl5cfyhxtLgKGdpI3oKyJffVRI=" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="css/all.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="css/main.css">
  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" /> -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>

  <!-- Script para selecionar las hojas de estilo dependiendo de la pagina  -->
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    } elseif($pagina == 'conferencia'){
      // echo '<link rel="stylesheet" href="css/lightbox.css">';
      echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" />';

    }
  ?>
    
  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <header class="site-header">
      <div class="hero">
        <div class="contenido-header">
          <nav class="redes-sociales">
          <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.pinterest.com"><i class="fab fa-pinterest-p"></i></a>
            <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
          </nav>
          <div class="informacion-evento">
            <div class="clearfix">
                <p class="fecha"><i class="fas fa-calendar-alt"></i>01-03 Mayo</p>
                 <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Caracas, VE</p>
            </div>
            
             <h1 class="nombre-sitio">GDlWebCamp</h1>
             <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
         </div><!-- .informacion-evento -->
        </div>

      </div><!-- .hero-->
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
          <div class="logo">  
              <a href="index.php">
                <img src="img/logo.svg" alt="Logo gdlwebcamp">
              </a>
          </div>
          <div class="menu-movil">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <nav class="navegacion-principal clearfix">
            <a href="conferencia.php">Conferencia</a>
            <a href="calendario.php">Calendario</a>
            <a href="invitados.php">Invitados</a>
            <a href="registro.php">Reservaciones</a>
          </nav>
        </div><!-- .contenedor-->
    </div><!-- .barra-->