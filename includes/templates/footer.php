<footer class="site-footer">  
      <div class="contenedor clearfix">
        <div class="footer-informacion">
          <h3>Sobre <span>Gdlwebcamp</span></h3>
          <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit, id tempor turpis pulvinar et. Ut bibendum finibus massa non molestie. Curabitur urna metus, placerat gravida lacus ut, lacinia congue orci. Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempus euismod.</p>
        </div>
        <div class="ultimos-tweets">
          <h3>Ultimos <span>tweets</span></h3>
          <ul>
            <li>Integer ultricies #justo nec ipsum finibus, eu interdum quam vulputate. Pellentesque nec justo non est eleifend pulvinar.</li>
            <li>Integer ultricies #justo nec ipsum finibus, eu interdum quam vulputate. Pellentesque nec justo non est eleifend pulvinar.</li>
            <li>Integer ultricies #justo nec ipsum finibus, eu interdum quam vulputate. Pellentesque nec justo non est eleifend pulvinar.</li>
          </ul>
        </div>
        <div class="menu">
          <h3>Redes <span>Sociales</span></h3>
          <nav class="redes-sociales">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
        </div>
      </div>
      <p class="copyright">Todos los derechos reservados GDLWEBCAMP 2020 &copy</p>
    </footer> 

  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script src="js/main.js"></script>
   
  <!-- Script para selecionar las hojas de estilo dependiendo de la pagina  -->
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>';
    } elseif($pagina == 'conferencia'){
      echo '<script src="js/lightbox.js"></script>';
    }
  ?>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
