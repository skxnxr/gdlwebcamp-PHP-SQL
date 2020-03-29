<?php 
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear evento
        <small>Recuerda llenar todos los campos</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-10">

    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Llena el formulario parar añadir un nuevo evento</h3>
        </div>
        <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
              
                <div class="form-group">
                  <label for="titulo_evento">Título evento:</label>
                  <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Título del evento">
                </div>
               
                <div class="form-group">
                  <label for="password">Categoría:</label>
                  <select name="categoria_evento" class="form-control">
                  <!-- <select name="categoria_evento" class="form-control seleccionar"> -->
                  <!-- Eliminada la libreria select2 = seleccionar -->
                    <option value="0">- Seleccione -</option>
                    <?php 
                    try {
                      $sql = "SELECT * FROM categoria_evento";
                      $resultado = $conn->query($sql);
                      while ($cat_evento = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $cat_evento['id_categoria']; ?>"> 
                          <?php echo $cat_evento['cat_evento']; ?>
                        </option>
                    <?php  }
                    } catch (Exception $e) {
                      echo "Error: " . $e->getMessage();
                    }
                    ?>
                  </select>
                </div>
                <!-- Date -->
              <div class="form-group">
                <label>Fecha del evento:</label>
                    <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                      <input type="text" class="form-control pull-right" id="fecha">
                    </div>
              </div>
                <!-- /.input group -->
                              <!-- time Picker -->
              <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Hora:</label>

                        <div class="input-group">
                          <input type="text" class="form-control timepicker">

                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                      <!-- /.input group -->
                    </div>
                <!-- /.form group -->
              </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    
    </div>
     </div>

   </div> 
  
  

  <?php 
include_once 'templates/footer.php'; ?>

