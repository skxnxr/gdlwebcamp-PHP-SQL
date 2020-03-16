<?php include_once 'includes/templates/header.php'; ?>



    
    <section class="section contenedor">
        <h2>Calendario de eventos</h2>

        <?php 
        try {
            require_once('includes/funciones/bd_conexion.php');
            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id "; 
            $sql .= " ORDER BY evento_id ";
            $resultado = $conn->query($sql);
        } catch (\Exception $e) {
           echo $e->getMessage();
        }
        ?>

        <div class="calendario">
        <?php 
            $calendario = array();
            while ($eventos = $resultado->fetch_assoc()){ 
                $fecha = $eventos['fecha_evento'];
                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => 'fa' . " " . $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']

                );
                $calendario[$fecha][] = $evento;
                ?>
            <?php }   //while de fetch_assoc()    ?>
            <?php 
                //Imprime todos los eventos
                foreach($calendario as $dia => $lista_eventos){ ?>
                        <h3>
                            <i class="fa fa-calendar"></i>
                            <?php 
                            setlocale(LC_TIME, 'es_ES.UTF-8');
                            setlocale(LC_TIME, 'spanish');
                            // echo strftime("%A, %d de %B del %Y", strtotime($dia) ); 
                            echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia) )); ?>
                        </h3>
                        <?php foreach($lista_eventos as $evento){?>
                            <div class="dia">
                                <p class = "titulo"> <?php echo utf8_encode($evento['titulo']); ?> </p>
                                <p class = "hora"> 
                                    <i class="fa fa-clock" aria-hidden="true"></i>
                                    <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                                </p>
                                <p>
                                    <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i>
                                    <?php echo $evento['categoria']; ?>
                                </p>
                                <p>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo $evento['invitado']; ?>
                                </p>
                            </div>

                        <?php }   //fin foreach eventos?>
                <?php   }  //fin foreach de dias?>
          
            
                
                </div>
               
        
        <?php $conn->close(); ?>
        
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>









<!--
Texto "Sobre gdlwwebcamp": 
Texto tweers: 

Integer ultricies justo nec ipsum finibus, eu interdum quam vulputate. #Pellentesque nec justo non est eleifend pulvinar.
 Integer ultricies #justo nec ipsum finibus, eu interdum quam vulputate. Pellentesque nec justo non est eleifend pulvinar.
 Integer ultricies justo nec ipsum finibus, eu interdum quam vulputate. #Pellentesque nec @justo non est eleifend pulvinar.
--> 


  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/lightbox.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script> 
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
