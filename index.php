<?php include_once 'includes/templates/header.php'; ?>

    <section class="section contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>GDLWebCamp 2020 espera a más de 60000 asistentes internacionales. Aproveche su experiencia al máximo, reservando su cupo por tres días, este el lugar de reunión mundial para todos los que prosperan en el negocio de las tecnologías de la información.</p> 
    </section><!--seccion-->

    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg" muted>
            <source src="video/video.mp4" type="video/mp4"> 
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogg">
        </video>
      </div><!--contenedor-video-->

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>

            <?php 
            

              try {
                  require_once('includes/funciones/bd_conexion.php');
                  $sql = "SELECT * FROM `categoria_evento` ";
                  $resultado = $conn->query($sql);
              } catch (\Exception $e) {
                echo $e->getMessage();
              }
              ?>

            <nav class="menu-programa"> 
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
            <?php $categoria = $cat['cat_evento']; ?>
              <a href="#<?php echo strtolower($categoria) ?>">
                <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
              </a>
            <?php } ?>  
            </nav>

            <?php 
              try {
                  require_once('includes/funciones/bd_conexion.php');
                  $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                  $sql .= " FROM eventos ";
                  $sql .= " INNER JOIN categoria_evento ";
                  $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                  $sql .= " INNER JOIN invitados ";
                  $sql .= " ON eventos.id_inv = invitados.invitado_id "; 
                  $sql .= "AND eventos.id_cat_evento = 1";
                  $sql .= " ORDER BY evento_id LIMIT 2;";
                  $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                  $sql .= " FROM eventos ";
                  $sql .= " INNER JOIN categoria_evento ";
                  $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                  $sql .= " INNER JOIN invitados ";
                  $sql .= " ON eventos.id_inv = invitados.invitado_id "; 
                  $sql .= "AND eventos.id_cat_evento = 2";
                  $sql .= " ORDER BY evento_id LIMIT 2;";
                  $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                  $sql .= " FROM eventos ";
                  $sql .= " INNER JOIN categoria_evento ";
                  $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                  $sql .= " INNER JOIN invitados ";
                  $sql .= " ON eventos.id_inv = invitados.invitado_id "; 
                  $sql .= "AND eventos.id_cat_evento = 3";
                  $sql .= " ORDER BY evento_id LIMIT 2;";
                  $resultado = $conn->query($sql);
              } catch (\Exception $e) {
                echo $e->getMessage();
              }
           ?>

            <?php $conn->multi_query($sql); ?>

            <?php 
              do {
                $resultado = $conn->store_result();
                $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

                <?php $i = 0; ?>
                <?php foreach($row as $evento): ?>
                <?php if ($i % 2 == 0) { ?>
                  <div class="info-curso ocultar clearfix" id="<?php echo strtolower($evento['cat_evento']) ?>">
                <?php } ?>
                    <div class="detalle-evento">
                      <?php
                      //  echo "<pre>";
                      // var_dump($evento);
                      //  echo "</pre>";
                      ?>
                      <h3><?php echo utf8_encode(utf8_decode($evento['nombre_evento'])); ?></h3>
                      <p><i class="fa fa-clock" aria-hidden="true"></i>
                        <?php 
/** Acomodar Hora*/ 
                          // $hora = $evento['hora_evento']; 
                          // $hora_formateada = strftime("%H", srtotime($hora));
                          // echo $hora_formateada;
                          echo $evento['hora_evento']; 
                        ?>
                      </p>
                      <p><i class="fa fa-calendar" aria-hidden="true"></i>
                          <?php 
                            $spanish = array('es_utf8', 'es', 'es-ES', 'Spanish_Modern_Sort', 'es_utf8', 'es_ES@euro', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain', 'es_ES.utf8', 'es-es');
                            setlocale(LC_ALL, $spanish);
                            $fecha = strftime("%A %d/%m/%Y", strtotime($evento['fecha_evento'])); 
                            echo utf8_encode($fecha);
                          ?>
                      </p>
                      <p><i class="fa fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                    </div>
                    
                    <?php if ($i % 2 == 1): ?>
                      <a href="calendario.php" class="boton float-right"> Ver todos</a>
                      </div>
                    <?php endif; ?>
                <?php $i++; ?>
              <?php endforeach; ?>
              <?php $resultado->free(); ?>
            <?php  } while ($conn->more_results() && $conn->next_result());  ?>
            

            
          </div>
        </div>
      </div><!--Contenido-progrma-->
    </section><!--programa-->

    <?php include_once 'includes/templates/invitados.php'; ?>

    <div class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento clearfix">
          <li><p class="numero">0</p> Invitados</li>
          <li><p class="numero">0</p> Talleres</li>
          <li><p class="numero">0</p> Días</li>
          <li><p class="numero">0</p> Conferencias</li>
        </ul>
      </div>
    </div>

    <section class="precios section">
      <h2>Precios</h2>
      <div class="contenedor">
        <ul class="lista-precios clearfix">
          <li>
            <div class="tabla-precio">
              <h3>Pase por día</h3>
              <p class="numero">$30</p>
              <ul>
                <li>Bocadillos gratis</li>
                <li>Todas las conferencias</li >
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="boton hollow"> Comprar</a>
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
              <a href="#" class="boton "> Comprar</a>
            </div>
          </li>
          <li>
            <div class="tabla-precio">
              <h3>Pase por dos días</h3>
              <p class="numero">$45</p>
              <ul>
                <li>Bocadillos gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="boton hollow"> Comprar</a>
            </div>
          </li>
        </ul>
      </div>
    </section>
    
    <!-- Mapa openstreetmap -->
    <div class="mapa" id="mapa" >

    </div>

    <section class="section">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
          <blockquote>
            <p>Un entorno maravilloso para aprender lo ultimo de tecnologías web, el año pasado asistí al evento y el mismo día conecte con una multnacional, estoy muy contento la verdad con GdlWebCamp.</p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="Imagen testimonial1">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite>
            </footer>
          </blockquote>
        </div> <!--Fin del testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>¡Todos deberian asistir! Por lo menos deben darle una oportunidad para disfrutar con otros colegas, se conoce a programadores todos muy profesionales y los talleres son excelentes.</p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial2.jpg" alt="Imagen testimonial2">
              <cite>Ana Sánchez <span>Maquetadora Web en @Jameson</span></cite>
            </footer>
          </blockquote>
        </div> <!--Fin del testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Maravilloso, hace dos años estaba muy triste por quedar desfasado con respecto al desarrollo web y con estos seminarios, he vuelto y soy indetenible! Muchas gracias GDLWebCamp por ayudarme a seguir mis sueños.</p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial3.jpg" alt="Imagen testimonial3">
              <cite>Saul Goodman<span>QA Engineer en @BCS</span></cite>
            </footer>
          </blockquote>
        </div> <!--Fin del testimonial-->
      </div>
    </section>

    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>Registrate al Newsletter:</p>
        <h3>Gdlwebcamp</h3>
        <a href="#mc_embed_signup" class="boton_newsletter boton transparent"> Registro</a>
      </div>
    </div>

    <section class="section">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva">
        <ul class="clearfix">
          <li><p id="dias" class="numero"></p> días</li>
          <li><p id="horas" class="numero"></p> horas</li>
          <li><p id="minutos" class="numero"></p> minutos</li>
          <li><p id="segundos" class="numero"></p> segundos</li>
        </ul>
      </div>
    </section>
    
    <?php include_once 'includes/templates/footer.php'; ?>

    