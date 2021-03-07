<?php
session_start();
if (!empty($_POST)) {
    if (empty($_POST['loginAlumno']) || empty($_POST['contraAlumno'])) {
        echo '<div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">×</button><a class="alert-link" href="#"></a>Todos los campos son requeridos.
      </div>';
    } else {
        require_once 'conexion.php';
        $login = $_POST['loginAlumno'];
        $contra = $_POST['contraAlumno'];


        $sql = 'SELECT alumno.*,anteproyectos.idAnteproyecto,residencias.idResidencia FROM alumno left join anteproyectos on alumno.alumno_id=anteproyectos.ncontrol left join residencias on residencias.idAnteproyecto=anteproyectos.idAnteproyecto WHERE correo =? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($login));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            if (password_verify($contra, $result['clave'])) {
                if ($result['estado'] == 1) {
                    $_SESSION['activeA'] = true;
                    $_SESSION['alumno_id'] = $result['alumno_id'];
                    $_SESSION['nombre'] = $result['nombre'];
                    $_SESSION['correo'] = $result['correo'];
                    $_SESSION['apellido_p'] = $result['apellido_p'];
                    $_SESSION['apellido_m'] = $result['apellido_m'];
                    $_SESSION['ncontrol'] = $result['ncontrol'];
                    $_SESSION['idAnteproyecto'] = $result['idAnteproyecto'];
                    $_SESSION['idResidencia'] = $result['idResidencia'];


                    echo '<div class="alert alert-dismissible alert-success"><strong>Accediendo...</strong></div>';
                } else {
                    echo '<div class="alert alert-dismissible alert-warning">
                <button class="close" type="button" data-dismiss="alert">×</button><strong>Estado inactivo, comuniquese con el administrador.</strong><a class="alert-link" href="#"></a>
              </div>';
                }
            } else {
                echo '<div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">×</button><strong>Contraseña o correo incorrecto.</strong><a class="alert-link" href="#"></a>
      </div>';
            }
        } else {
            echo '<div class="alert alert-dismissible alert-danger">
    <button class="close" type="button" data-dismiss="alert">×</button><strong>Por favor inicia sesion donde te corresponde.</strong><a class="alert-link" href="#"></a>
  </div>';
        }
    }
}
