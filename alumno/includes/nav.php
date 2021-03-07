 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"> <?=$_SESSION['nombre'];?> <?=$_SESSION['apellido_p'];?> <?=$_SESSION['apellido_m']; ?></p>
          <p class="app-sidebar__user-designation">Alumno</p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span
         class="app-menu__label">Inicio</span></a></li>
         <li><a class="app-menu__item" href="banco_proyectos.php"><i class="app-menu__icon fas fa-clipboard-list"></i><span
         class="app-menu__label">Banco de proyectos</span></a></li>
         <li><a class="app-menu__item" href="formatos_residencias.php"><i class="app-menu__icon fas fa-file-signature"></i><span
         class="app-menu__label">Formatos de Residencia</span></a></li>
         <li ><a class="app-menu__item" href="anteproyecto.php"><i class="app-menu__icon fas fa-file-archive"></i><span
         class="app-menu__label">Anteproyecto</span></a></li>
          <?php 
          $idResidencia=$_SESSION['idResidencia'];
          if($idResidencia!=null)
          {
            
            echo '<li ><a class="app-menu__item" href="residencia.php"  ><i class="app-menu__icon fas fa-user-graduate"  ></i><span
            class="app-menu__label" >Mi Residencia</span></a></li>';

          }else{
            echo '<li ><a class="nav-item nav-link disabled" href="residencia.php"  ><i class="app-menu__icon fas fa-user-graduate"  ></i><span
            class="app-menu__label" >Mi Residencia</span></a></li>';
          }
          ?>
        
      </ul>
    </aside>