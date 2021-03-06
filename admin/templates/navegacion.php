  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!-- <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div> -->
        <div class=" info">
        <!-- <div class="pull-left info"> -->
          <p>Admin: <span><?php echo $_SESSION['usuario']; ?></span></p>
          <a href=""><i class="fa fa-circle text-success"></i>Nivel: Administrador</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
          </span>
        </div>
      </form> 
      <!-- /.search form
         sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú de administración</li>
        <li class="nav-link">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Eventos</span>
            <!-- <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span> -->
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-evento.php"><i class="fa fa-list-ul"></i>Ver todos</a></li>
            <li><a href="crear-evento.php"><i class="fa fa-plus-circle"></i> Agregar  </a></li>
            <!-- <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Categoría Eventos</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-categorias.php"><i class="fa fa-list-ul"></i>Ver todos</a></li>
            <li><a href="crear-categoria.php"><i class="fa fa-plus-circle"></i> Agregar  </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span>Invitados</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-invitados.php"><i class="fa fa-list-ul"></i>Ver todos</a></li>
            <li><a href="crear-invitado.php"><i class="fa fa-plus-circle"></i> Agregar  </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card" aria-hidden="true"></i>
            <span>Registrados</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-registrados.php"><i class="fa fa-list-ul"></i>Ver todos</a></li>
            <li><a href="crear-registro.php"><i class="fa fa-plus-circle"></i> Agregar  </a></li>
          </ul>
        </li>
        <?php if ($_SESSION['nivel'] == 1): ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Administradores</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-admin.php"><i class="fa fa-list-ul"></i>Ver todos</a></li>
            <li><a href="crear-admin.php"><i class="fa fa-plus-circle"></i> Agregar  </a></li>
          </ul>
        </li>
        <?php endif; ?>
        <li class="nav-link">
          <a href="login.php?cerrar_sesion=true">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span>Cerrar Sesión</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list-ul"></i>Ver todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i> Agregar  </a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>