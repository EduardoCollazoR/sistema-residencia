 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><?=$_SESSION['nombre'];?> <?=$_SESSION['apellido_p'];?> <?=$_SESSION['apellido_m'];?></p>
          <p class="app-sidebar__user-designation"><?=$_SESSION['nombre_rol'];?></p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span
         class="app-menu__label">Inicio</span></a></li>
      <li><a class="app-menu__item" href="banco_proyectos.php"><i class="app-menu__icon fas fa-clipboard-list"></i><span
         class="app-menu__label">Banco de proyectos</span></a></li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon  fas fa-users"></i><span class="app-menu__label">Usuarios del Sistema</span><i class="treeview-indicator fas fa-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="lista_usuarios.php"><i class="icon fas fa-list-ul"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="lista_alumnos.php" ><i class="icon fas fa-list-ul"></i> Alumnos</a></li>
            <li><a class="treeview-item" href="lista_profesores.php"><i class="icon fas fa-list-ul"></i> Profesores</a></li>
            <li><a class="treeview-item" href="lista_empresas.php"><i class="icon fas fa-list-ul"></i> Empresas</a></li>
          </ul>
          </li>
         <li><a class="app-menu__item" href="formatos_residencias.php"><i class="app-menu__icon fas fa-file-signature"></i><span
         class="app-menu__label">Formatos de Residencia</span></a></li>
         <li><a class="app-menu__item" href="periodos.php"><i class="app-menu__icon  fas fa-calendar-day"></i><span
         class="app-menu__label">Periodos</span></a></li>
         <li><a class="app-menu__item" href="anteproyectos.php"><i class="app-menu__icon  fas fa-archive"></i><span
         class="app-menu__label">Anteproyectos</span></a></li>
         <li><a class="app-menu__item" href="residencias.php"><i class="app-menu__icon  fas fa-gavel"></i><span
         class="app-menu__label">Residencias</span></a></li>
         <li><a class="app-menu__item" href="cartas.php"><i class="app-menu__icon  fas fa-file-contract "></i><span
         class="app-menu__label">Cartas de terminacion</span></a></li>
         
      </ul>
    </aside>