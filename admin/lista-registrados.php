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
        Listado de personas registradas
        <!-- <small>it all starts here</small> -->
      </h1>
    </section>

<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-xs-12">         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los visitantes registrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   try {
                     $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados";
                     $sql .= " JOIN regalos ";
                     $sql .= " On registrados.regalo = regalos.id_regalo ";
                     //Para debuggear
                     //echo $sql;
                     //Se ve en el navegador la instruccion y se puede copiar en la tabla de MySQL para visualizar el error en la consola
                     $resultado = $conn->query($sql);
                   } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                   }
                   while ($registrados = $resultado->fetch_assoc()) { ?>
                     <tr>
                      <td>
                        <?php echo $registrados['nombre_registrado'] . " " . $registrados['apellido_registrado']; 
                          $pagado = $registrados['pagado'];
                          if ($pagado) {
                            echo '<br>';
                            echo '<span class="badge bg-green">Pagado</span>';
                          }else{
                            echo '<br>';
                            echo '<span class="badge bg-red">No pagado</span>';
                          }
                        ?>
                      </td>
                      <td> <?php echo $registrados['email_registrado']; ?> </td>
                      <td> <?php echo $registrados['fecha_registro']; ?> </td>
                      <td> 
                        <?php 
                            $articulos = json_decode($registrados['pases_articulos'], true);
                            $arreglo_articulos = array(
                              'un_dia' => 'Pase 1 día',
                              'pase_2dias' => 'Pase 2 días',
                              'pase_completo' => 'Pase completo',
                              'camisas' => 'Camisas',
                              'etiquetas' => 'Etiquetas'
                            );
                            foreach ($articulos as $key => $articulo) {
                              if (array_key_exists('cantidad', $articulo)) {
                                echo $articulo['cantidad'] . " " . $arreglo_articulos[$key]. "<br>";
                              }else {
                                echo $articulo . " " . $arreglo_articulos[$key]. "<br>";
                              }
                              
                            }
                        ?> 
                      </td>
                      <td> 
                        <?php $eventos_resultado = $registrados['talleres_registrados']; 
                            $talleres = json_decode($eventos_resultado, true);
                            $talleres = implode("', '", $talleres['eventos']);
                            $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE evento_id IN ('$talleres') ";
                            //$sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') OR evento_id IN ('$talleres') ";
                            //echo $sql_talleres;
                            //Para debuggear
                            $resultado_talleres = $conn->query($sql_talleres);
                            while ($eventos = $resultado_talleres->fetch_assoc()) {
                              echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>";
                            }
                        ?> 
                      </td>
                      <td> <?php echo $registrados['nombre_regalo']; ?> </td>
                      <td>$ <?php echo $registrados['total_pagado']; ?> </td>
                      <td>
                        <a href="editar-registro.php?id=<?php echo $registrados['id_registrado']; ?>" class="btn bg-orange btn-flat margin">
                          <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" data-id="<?php echo $registrados['id_registrado']; ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                     </tr>
                <?php   }  ?>  
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha registro</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->



   </div> 
  
  

  <?php 
include_once 'templates/footer.php'; ?>

