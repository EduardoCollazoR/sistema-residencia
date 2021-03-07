<?php
require_once 'includes/header.php';
?>

<main class="app-content">
<div class="app-title">
        <div>
            <h1>CONFIGURACION</h1>
            <hr class="red"></hr>
        </div>
    </div>
      <div class="row user">
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-datos" data-toggle="tab">Datos Personales</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Cambio de Contraseña</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-datos">
              <div class="tile user-settings">
                <h4 class="line-head">Datos Personales</h4>
                <form>
                <div class="row mb-4">
                    <div class="col-md-4">
                      <label>Nombre</label>
                      <input class="form-control"  readonly="" disabled placeholder=" <?=$_SESSION['nombre'];?>"">
                    </div>
                    <div class="col-md-4">
                      <label>Apellido Paterno</label>
                      <input class="form-control"  readonly=""  disabled placeholder=" <?=$_SESSION['apellido_p'];?>"">
                    </div>
                    <div class="col-md-4">
                      <label>Apellido Materno</label>
                      <input class="form-control"  readonly="" disabled placeholder=" <?=$_SESSION['apellido_m'];?>"">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Numero de Control</label>
                      <input class="form-control"  readonly=""  disabled placeholder=" <?=$_SESSION['ncontrol'];?>">
                    </div>
                    <div class="clearfix"></div>
                   
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Correo Institucional</label>
                      <input class="form-control"  readonly="" disabled placeholder=" <?=$_SESSION['correo'];?>"">
                    </div>
                    <div class="clearfix"></div>
                   
                  </div>
                 
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Cambio de Contraseña</h4>
                <form action="" method="post" id="frmChangePass" name="frmChangePass">
                  <div class="row">                 
                    <div class="col-md-8 mb-4">
                      <label>Nueva Contraseña</label>
                      <input class="form-control col-md-8" class="newPass"  type="password" id="newPass" required autofocus>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Confirmar Contraseña</label>
                      <input class="form-control col-md-8" class="newPass"  type="password" id="passConfirm" required>
                    </div>
                  
                  <div class="col-md-8 mb-4">
                  <div class="messagePass" style="display: none;"></div>
                  </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit" id="Changepass">Actualizar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
require_once 'includes/copy.php';
?>
    </main>


<?php
require_once 'includes/footer.php';
?>