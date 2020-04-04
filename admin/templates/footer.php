<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 4.1
    </div>
    <strong>Copyright &copy; 2018-2020 <a href="https://adminlte.io">GDLWebCamp</a>.</strong> Todos los derechos reservados.
  </footer>

  </div>
  <!-- /.content-wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/admin-ajax.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="js/select2.full.min.js"></script>
<!-- bootstrap time picker -->
<script src="js/bootstrap-timepicker.min.js"></script>
<!-- Font Awesome Icon Picker -->
<script src="js/fontawesome-iconpicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="js/icheck.min.js"></script>
<!-- Morris.js charts -->
<script src="js/raphael.min.js"></script>
<script src="js/morris.min.js"></script>
<!-- Scripts propio -->
<script src="../js/cotizador.js"></script>
<script src="js/app.js"></script>
<script src="js/login-ajax.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/r-2.2.3/rr-1.2.6/datatables.min.js"></script>

<!-- Script para selecionar las hojas de estilo dependiendo de la pagina  -->
<?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    
    if ($pagina === 'dashboard') {
      echo '<script src="js/morris-app.js"></script>';
    }
 ?>



</body>
</html>
