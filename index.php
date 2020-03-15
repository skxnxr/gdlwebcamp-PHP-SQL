<?php include_once 'includes/templates/header.php'; ?>

    <section class="section contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p> 
    </section><!--seccion-->

    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4"> 
            <source src="video/video.webm" type="video/webm">
          <source src="video/video.ogv" type="video/ogg">
        </video>
      </div><!--contenedor-video-->

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>
            <nav class="menu-programa">
              <a href="#talleres"><i class="fa fa-code" aria-hidden="true"></i>Talleres</a>
              <a href="#conferencias"><i class="fa fa-comment" aria-hidden="true"></i>Conferencias</a>
              <a href="#seminarios"><i class="fa fa-university" aria-hidden="true"></i>Seminarios</a>
            </nav>
            <div class="info-curso ocultar clearfix" id="talleres">
              <div class="detalle-evento">
                <h3>HTML5, CSS3 y JavaScript</h3>
                <p><i class="fa fa-clock" aria-hidden="true"></i>4:00pm</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de abril</p>
                <p><i class="fa fa-user" aria-hidden="true"></i>S. Alvarez</p>
              </div>
              <div class="detalle-evento">
                <h3>Responsive Web Desing</h3>
                <p><i class="fa fa-clock" aria-hidden="true"></i>8:00pm</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de abril</p>
                <p><i class="fa fa-user" aria-hidden="true"></i>S. Alvarez</p>
              </div>
              <a href="#" class="boton float-right"> Ver todos</a>
            </div>
            <div class="info-curso ocultar clearfix" id="conferencias">
              <div class="detalle-evento">
                <h3>Como ser Freelancer</h3>
                <p><i class="fa fa-clock" aria-hidden="true"></i>10:00am</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de abril</p>
                <p><i class="fa fa-user" aria-hidden="true"></i>Gregorio Sánchez</p>
              </div>
              <div class="detalle-evento">
                <h3>Tecnologías del futuro</h3>
                <p><i class="fa fa-clock" aria-hidden="true"></i>5:00pm</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i>10 de abril</p>
                <p><i class="fa fa-user" aria-hidden="true"></i>Susan Sánchez</p>
              </div>
              <a href="#" class="boton float-right"> Ver todos</a>
            </div>
            <div class="info-curso ocultar clearfix" id="seminarios">
              <div class="detalle-evento">
                <h3>Diseño UI/UX para móviles</h3>
                <p><i class="fa fa-clock" aria-hidden="true"></i>5:00pm</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i>11 de abril</p>
                <p><i class="fa fa-user" aria-hidden="true"></i>Harold García</p>
              </div>
              <div class="detalle-evento">
                <h3>Aprende a programar en una mañana</h3>
                <p><i class="fa fa-clock" aria-hidden="true"></i>10:00am</p>
                <p><i class="fa fa-calendar" aria-hidden="true"></i>11 de abril</p>
                <p><i class="fa fa-user" aria-hidden="true"></i>Susana Rivera</p>
              </div>
              <a href="#" class="boton float-right"> Ver todos</a>
            </div>
          </div>
        </div>
      </div><!--Contenido-progrma-->
    </section><!--programa-->

    <section class="invitados contenedor section">
      <h2>Nuestros invitados</h2>
      <ul class="lista-invitados clearfix">
        <li>
          <div class="invitado">
            <img src="img/invitado1.jpg" alt="Imagen invitado">
            <p>Rafael Bautista</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado2.jpg" alt="Imagen invitado">
            <p>Shari Herrera </p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado3.jpg" alt="Imagen invitado">
            <p>Gregorio Sanchez</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado4.jpg" alt="Imagen invitado">
            <p>Susana Rivera</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado5.jpg" alt="Imagen invitado">
            <p>Harold Garcia</p>
          </div>
        </li>
        <li>
          <div class="invitado">
            <img src="img/invitado6.jpg" alt="Imagen invitado">
            <p>Susan Sanchez</p>
          </div>
        </li>
      </ul>
    </section>

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
    
    <div id="mapa" class="mapa">

    </div>

    <section class="section">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
          <blockquote>
            <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.</p>
            <footer class="info-testimonial clearfix">
              <img src="/img/testimonial.jpg" alt="Imagen testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite>
            </footer>
          </blockquote>
        </div> <!--Fin del testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.</p>
            <footer class="info-testimonial clearfix">
              <img src="/img/testimonial.jpg" alt="Imagen testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite>
            </footer>
          </blockquote>
        </div> <!--Fin del testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis commodo quam in orci condimentum ultricies.</p>
            <footer class="info-testimonial clearfix">
              <img src="/img/testimonial.jpg" alt="Imagen testimonial">
              <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span></cite>
            </footer>
          </blockquote>
        </div> <!--Fin del testimonial-->
      </div>
    </section>

    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>Registrate al Newsletter:</p>
        <h3>Gdlwebcamp</h3>
        <a href="#" class="boton transparent"> Registro</a>
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
  <script src="js/jquery.waypoints.min.js"></script>
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
