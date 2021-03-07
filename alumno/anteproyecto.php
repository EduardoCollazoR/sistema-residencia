<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_anteproyecto.php';
require_once '../includes/conexion.php';

$ncontrol = $_SESSION['alumno_id'];

$sql = 'SELECT anteproyectos.idAnteproyecto,anteproyectos.nombre,anteproyectos.tipo,anteproyectos.estatus,periodos.nombre_periodo FROM anteproyectos inner join periodos on
            anteproyectos.periodo_id=periodos.periodo_id WHERE ncontrol=?';
$query = $pdo->prepare($sql);
$query->execute(array($ncontrol));

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($consulta); $i++) {
    $idAnteproyecto = $consulta[$i]['idAnteproyecto'];
    $nombre_proyecto = $consulta[$i]['nombre'];
    $nombre_periodo = $consulta[$i]['nombre_periodo'];

    if ($consulta[$i]['tipo'] == 1) {
        $tipo_proyecto = 'Interno';
    } else {
        $tipo_proyecto = 'Externo';
    }

    if ($consulta[$i]['estatus'] == 1) {
        $estado_proyecto = 'Pendiente';
    } elseif ($consulta[$i]['estatus'] = 2) {
        $estado_proyecto = 'En proceso';
    } else {
        $estado_proyecto = 'Residencia';
    }
}

if ($idAnteproyecto != null) {

    if (!isset($_POST['action'])) {
    } elseif (isset($_POST['action'])&&$_FILES['user_file']['name']!=null) {
        $name = $_FILES['user_file']['name'];
        $type = $_FILES['user_file']['type'];
        $data = file_get_contents($_FILES['user_file']['tmp_name']);
        $idDocumento = $_POST['idDocumento'];
    
        $sql = 'INSERT INTO anteproyectos_doc(idAnteproyecto,archivo,mime,data,fecha) VALUES(?,?,?,?,CURRENT_TIMESTAMP)';
        $query = $pdo->prepare($sql);
        $query->execute(array($idAnteproyecto, $name, $type, $data));
    }

    echo '
                
                                    <main class="app-content">
                                    <div class="app-title">
                                        <div>
                                            <h1>ANTEPROYECTO</h1>
                                            <hr class="red"></hr>
                                        </div>
                                    </div>
                                    <div class="row">
                    <div class="col-md-3-1">
                    <div class="widget-small info"><i class="icon fas fa-folder-plus fa-3x"></i>
                        <div class="info">
                        <h4>' . $nombre_proyecto . '</h4>
                        <p><b>Periodo &nbsp;&nbsp;&nbsp;' . $nombre_periodo . '</b></p>
                        <p><b>Tipo    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $tipo_proyecto . '</b></p>
                        <p><b>Estado  &nbsp;&nbsp;&nbsp;&nbsp;' . $estado_proyecto . '</b></p>
                        </div>
                    </div>
                    </div>
                    </div>    
                        
                            <div class="row">
                    <div class="col-md-6">
                        <div class="tile">
                            <h3 class="tile-title">Archivo del anteproyecto</h3>
                            <div class="tile-body">
                            <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data" >
                                <input type="hidden" name="idAnteproyecto" id="idAnteproyecto" value="">
                                <input type="hidden" name="idDocumento" id="idDocumento" value="">
                                <input type="hidden" name="fecha" id="fecha">
                                    
                                    
                                <div class="form-group">
                                <label for="control-label">Archivo</label>
                                    <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />   
                                
                                </div>    
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Archivo</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tile">
                            <h3 class="tile-title">Archivos</h3>
                            <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tableAnteproyectos">
                                    <thead>
                                        <tr>
                                        <th>Acciones</th>
                                        <th>Archivo</th>
                                        <th>Comentarios</th>
                                        <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                   </div>
                   </div>
                   </div>
                        </div>
                        
                <div class="tile mb-4">
          
                <div class="tile-body">
                <div class="bs-component">
                    <p>© 2020-2021 Ing. en Sistemas Computacionales. ® - Tu sistema de residencia profesional.</p>
                </div>
                </div>
                </div>
                </main>';
} else {
    echo '<main class="app-content">
    <div class="app-title">
    <div>
    <h1>ANTEPROYECTO</h1>
    <hr class="red"></hr>
    </div>
    <button class="btn btn-primary" type="button" onclick="openModalanteproyecto()">Alta de anteproyecto</button>
    </div>
            <div class="page-error tile">
              <h1><i class="fas fa-exclamation-circle"></i>Da de alta tu Anteproyecto</h1>
              <p>Para visualizar el contenido.</p>
            </div>
          <br>
          <div class="tile mb-4">
            <div class="tile-body">
            <div class="bs-component">
                <p>© 2020-2021 Ing. en Sistemas Computacionales. ® - Tu sistema de residencia profesional.</p>
            </div>
            </div>
        </div>
        </main>';
}

require_once 'includes/footer.php';
?>

<script type="text/javascript">
 if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
 </script>