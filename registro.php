<?php include_once 'includes/templates/header.php'; ?>


    <section class="section contenedor">
        <h2>Registro de usuarios</h2>
        <form id="registro" class="registro" action="pagar.php" method="POST">
            <div id="datos_usuario" class="registro caja clearfix">
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre Aquí">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Tu Apellido Aquí">
                </div>
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Tu email">
                </div>
                <div id="error">

                </div> 
            </div> <!--   fin de datos usuario -->

            <div id="paquetes" class="paquetes">
                 <h3>Elige el número de boletos</h3>

                 <ul class="lista-precios clearfix">
                    <li>
                      <div class="tabla-precio">
                        <h3>Pase por día (Viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                          <li>Bocadillos gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dia">Boletos deseados:</label>
                            <input type="number" min="0" max="pase_dia" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
                            <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="tabla-precio">
                        <h3>Todos los días</h3>
                        <p class="numero">$50</p>
                        <ul>
                          <li>Bocadillos gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_completo">Boletos deseados:</label>
                            <input type="number" min="0" max="pase_completo" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
                            <input type="hidden" value="50" name="boletos[completo][precio]">
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="tabla-precio">
                        <h3>Pase por dos días (Viernes y sábado)</h3>
                        <p class="numero">$45</p>
                        <ul>
                          <li>Bocadillos gratis</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                        </ul>
                        <div class="orden">
                            <label for="pase_dos_dias">Boletos deseados:</label>
                            <input type="number" min="0" max="pase_dos_dias" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                        </div>
                      </div>
                    </li>
                  </ul>

            </div> <!--   fin de paquetes -->

            <div id="eventos" class="eventos clearfix">
                <h3>Elige tus talleres</h3>
                <div class="caja">
                    <?php
                    
                        try {
                            require_once('includes/funciones/bd_conexion.php');
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
                        
                    
                      <div id="<?php $dia = utf8_encode($dia); echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix">
                          <h4><?php echo $dia; ?></h4>
                          <?php foreach($eventos['eventos'] as $tipo => $eventos_dias): ?>
                              <div> 
                                  <p><?php echo $tipo; ?>:</p>
                                    <?php foreach($eventos_dias as $evento){ ?>
                                        <label>
                                            <input type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                            <time><?php echo $evento['hora']; ?></time><?php echo " " . $evento['nombre_evento']; ?>
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

            <div id="resumen" class="resumen">
                <h3>Pagos y Extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label for="camisa_evento">Camisa del evento $10 <small>(Promoción 7% dto.)</small></label>
                            <input type="number" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                        </div> <!--.Orden-->
                        <div class="orden">
                            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript, Chrome)</small></label>
                            <input type="number" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0">
                            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                        </div> <!--.Orden-->
                        <div class="orden">
                            <label for="regalo">Seleccione un regalo:</label> <br>
                            <select id="regalo" name="regalo" required>
                                <option value="">-- Selecione un regalo --</option> 
                                <option value="2">Etiquetas</option>
                                <option value="1">Pulcera</option>
                                <option value="3">Bolígrafo</option>
                            </select>
                        </div> <!--.Orden-->
                        <input type="button" id="calcular" class="boton" value="Calcular">
                    </div><!--.Extras-->
                    <div class="total">
                        <p>Resumen:</p>
                        <div id="lista-productos">
                            
                        </div>
                        <p>Total:</p>
                        <div id="suma-total">
                                
                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido">
                        <input type="submit" id="btnRegistro" name="submit" class="boton" value="Pagar">
                    </div><!--.Total-->
                </div> <!--.Caja-->
            </div> <!--#Resumen-->

        </form>
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>   