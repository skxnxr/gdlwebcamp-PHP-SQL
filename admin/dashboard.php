<?php 
include_once 'funciones/sesiones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
include_once 'funciones/funciones.php';

?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Información sobre el evento</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-12">
      <div class="box-body chart-responsive">
          <div class="chart" id="line-chart" style="height: 300px;"></div>
        </div>
      </div>
        
    </div>
    <h2 class="page-header">Resumen de registros</h2>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <?php
            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
          ?>
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total registrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php
            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
          ?>
          <!-- small box -->
          <div class="small-box bg-orange-active">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>Total pagados</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php
            $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
          ?>
          <!-- small box -->
          <div class="small-box bg-red-active">
            <div class="inner">
              <h3><?php echo $registrados['registros']; ?></h3>

              <p>A espera de pago</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-times"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <?php
            $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1 ";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
          ?>
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$ <?php echo (float) $registrados['ganancias']; ?></h3>

              <p>Ganancias totales</p>
            </div>
            <div class="icon">
              <i class="fa fa-usd"></i>
            </div>
            <a href="lista-registrados.php" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    </div><!-- /.end row -->
    
    <h2 class="page-header">Regalos</h2>
    <div class="row">
      <div class="col-lg-4 col-xs-6">
            <?php
              $sql = "SELECT COUNT(total_pagado) AS pulsera FROM registrados WHERE pagado = 1 AND regalo = 1  ";
              $resultado = $conn->query($sql);
              $registrados = $resultado->fetch_assoc();

            ?>
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3> <?php echo $registrados['pulsera']; ?></h3>

                <p>Pulseras</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más Información <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
      </div>
      <div class="col-lg-4 col-xs-6">
            <?php
              $sql = "SELECT COUNT(total_pagado) AS Etiquetas FROM registrados WHERE pagado = 1 AND regalo = 2 ";
              $resultado = $conn->query($sql);
              $regalo = $resultado->fetch_assoc();
              
            ?>
            <!-- small box -->
            <div class="small-box bg-gray-active">
              <div class="inner">
                <h3> <?php echo $regalo['Etiquetas']; ?></h3>

                <p>Etiquetas</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más Información <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
      </div>
      <div class="col-lg-4 col-xs-6">
            <?php
              $sql = "SELECT COUNT(total_pagado) AS boligrafo FROM registrados WHERE pagado = 1 AND regalo = 3 ";
              $resultado = $conn->query($sql);
              $registrados = $resultado->fetch_assoc();
            ?>
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3> <?php echo $registrados['boligrafo']; ?></h3>

                <p>Bolígrafos</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="lista-registrados.php" class="small-box-footer">
                Más Información <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
      </div>
    </div> <!-- /.end row -->

    </section>
    <!-- /.content -->


   </div> 
  
  

  <?php 
include_once 'templates/footer.php'; ?>

