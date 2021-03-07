 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><?=$_SESSION['nombre'];?> <?=$_SESSION['apellido_p'];?> <?=$_SESSION['apellido_m']; ?></p>
          <p class="app-sidebar__user-designation">Profesor</p>
        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fas fa-home"></i><span
         class="app-menu__label">Inicio</span></a></li>
         <li><a class="app-menu__item" href="residencias.php"><i class="app-menu__icon  fas fa-chalkboard-teacher"></i><span
         class="app-menu__label">Asesorados</span></a></li>
         <li><a class="app-menu__item" href="cartas_de_terminacion.php"><i class="app-menu__icon fas fa-file-contract"></i><span
         class="app-menu__label">Cartas de terminacion</span></a></li>
         
    </aside>