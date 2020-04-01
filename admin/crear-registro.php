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
        Crea nuevos registros aquí        
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
          <h3 class="box-title">Llena el formulario parar crear un nuevo registro</h3>
        </div>
        <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido:</label>
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                <div id="paquetes" class="paquetes">
                <div class="box-header with-border">
                  <h3 class="box-title">Elige el número de boletos</h3>
                </div>

                 <ul class="lista-precios clearfix row">
                    <li class="col-md-4">
                      <div class="tabla-precio text-center">
                        <h3>Pase por día <br> (Viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                          <li>Bocadillos gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dia">Boletos deseados:</label>
                            <input type="number" class="form-control" min="0" max="pase_dia" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
                      </div>
                    </li>
                    <li class="col-md-4">
                      <div class="tabla-precio text-center">
                        <h3>Todos los días</h3>
                        <p class="numero">$50</p>
                        <ul>
                          <li>Bocadillos gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_completo">Boletos deseados:</label>
                            <input type="number" class="form-control" min="0" max="pase_completo" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
                            <input type="hidden" value="50" name="boletos[completo][precio]">
                        </div>
                      </div>
                    </li>
                    <li class="col-md-4">
                      <div class="tabla-precio text-center">
                        <h3>Pase por dos días (Viernes y sábado)</h3>
                        <p class="numero">$45</p>
                        <ul>
                          <li>Bocadillos gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dos_dias">Boletos deseados:</label>
                            <input type="number" class="form-control" min="0" max="pase_dos_dias" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                        </div>
                      </div>
                    </li>
                  </ul>
                </div> <!--   fin de paquetes -->
              </div>
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Elige los talleres</h3>
                </div>
                <div id="eventos" class="eventos clearfix">
                <div class="caja">
                    <?php
                    
                        try {
                            $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado";
                            $sql .= " FROM eventos ";
                            $sql .= " JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento  ";
                            //echo $sql;
                            $resultado = $conn->query($sql);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                        $eventos_dias = array();
                        while ($eventos = $resultado->fetch_assoc()) {
                            $fecha = $eventos['fecha_evento'];
                           
                            //Spanish
                            $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es');
                            setlocale(LC_ALL, $spanish);
                            //----------------------------------------------
                            $dia_semana = strftime("%A", strtotime($fecha));
                            $categoria = $eventos['cat_evento'];
                            $dia = array(
                                'nombre_evento' => $eventos['nombre_evento'],
                                'hora' => $eventos['hora_evento'],
                                'id' => $eventos['evento_id'],
                                'nombre_invitado' => $eventos['nombre_invitado'],
                                'apellido_invitado' => $eventos['apellido_invitado']
                            );
                            $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                        } 
                        //  echo "<pre>";
                        //  var_dump($eventos_dias);
                        //  echo "</pre>";
                        
                        //var_dump(setlocale(LC_TIME , 'es_ES.UTF-8'));
                    ?>
                    <?php foreach ($eventos_dias as $dia => $eventos) { ?>
                        
                    
                      <div id="<?php $dia = utf8_encode($dia); echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix row">
                          <h4 class="text-center nombre-dia"><?php echo $dia; ?></h4>
                          <?php foreach($eventos['eventos'] as $tipo => $eventos_dias): ?>
                              <div class="col-md-4"> 
                                  <p><?php echo $tipo; ?>:</p>
                                    <?php foreach($eventos_dias as $evento){ ?>
                                        <label>
                                            <input type="checkbox" class="flat-green" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                            <time>
                                                <?php  
                                                $hora = $evento['hora']; 
                                                $hora_formato = date('h:i a', strtotime($hora));
                                                echo $hora_formato;
                                                ?>
                                            </time>
                                            <?php echo " " . $evento['nombre_evento']; ?>
                                            <br>
                                            <span class="autor"><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></span>
                                        </label>
                                    <?php } //foreach ?> 
                              </div>
                          <?php endforeach; ?>    
                      </div> <!--#día-->
                    <?php } ?>    
                  </div><!--.caja-->
                </div> <!--#eventos-->
              </div>
              <div id="resumen" class="resumen">
                <div class="box-header with-border"> 
                  <h3 class="box-title">Pagos y extras</h3>
                </div>
                <br>
                <div class="caja clearfix row">
                    <div class="extras col-md-6">
                        <div class="orden">
                            <label for="camisa_evento">Camisa del evento $10 <small>(Promoción 7% dto.)</small></label>
                            <input type="number" class="form-control" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                        </div> <!--.Orden-->
                        <div class="orden">
                            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                            <input type="number" class="form-control" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                        </div> <!--.Orden-->
                        <div class="orden">
                            <label for="regalo">Seleccione un regalo:</label> <br>
                            <select id="regalo" name="regalo" required class="form-control select2">
                                <option value="">-- Selecione un regalo --</option> 
                                <option value="2">Etiquetas</option>
                                <option value="1">Pulcera</option>
                                <option value="3">Bolígrafo</option>
                            </select>
                        </div> <!--.Orden-->
                        <br>
                        <input type="button" id="calcular" class="btn btn-success" value="Calcular">
                    </div><!--.Extras-->
                    <div class="total col-md-6">
                        <p>Resumen:</p>
                        <div id="lista-productos">
                            
                        </div>
                        <p>Total:</p>
                        <div id="suma-total">
                                
                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido">
                        
                    </div><!--.Total-->
                </div> <!--.Caja-->
            </div> <!--#Resumen-->
          </div> <!-- /.box-body -->

              

              <div class="box-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
              </div>
            </form>
        </div>        <!-- /.box-body -->
      </div>      <!-- /.box -->

    </section>
    <!-- /.content -->
    
    </div>
     </div>

   </div> 
  
  

  <?php 
include_once 'templates/footer.php'; ?>

