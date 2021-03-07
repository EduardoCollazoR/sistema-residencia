<?php
require_once 'includes/header.php';
require_once '../includes/conexion.php';


if(empty($_POST['idResidencia']) && (!isset($_POST['action'])) ){
   
    
}else if (isset($_POST['action']) && !empty($_POST['idResidencia']) &&$_FILES['user_file']['name']!=null ){

$idResidencia = $_POST['idResidencia'];
$name= $_FILES['user_file']['name'];
$type= $_FILES['user_file']['type'];
$data = file_get_contents($_FILES['user_file']['tmp_name']);

$sql = 'INSERT INTO profesores_cartasterminacion(idResidencia,archivo,mime,datos,fecha) VALUES(?,?,?,?,CURRENT_TIMESTAMP)';
$query = $pdo->prepare($sql); 
$query->execute(array($idResidencia,$name,$type,$data));


}

?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>CARTAS DE TERMINACION</h1>
            <hr class="red"></hr>
        </div>
        <div>
        
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="tile">
                <h3 class="tile-title">Cartas de Terminacion</h3>
                <div class="tile-body">
                <form method="POST" id="formCarta" name="formcarta" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="control-label">Seleccion de Asesor</label>
                        <select class="form-control" name="idResidencia" id="idResidencia"> 
                        
                        </select>
                    </div>
                    <input type="hidden" name="fecha" id="fecha">
                    <div class="form-group">
                        <label for="control-label">Archivo</label>
                    <input class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" name="action" id= "action"><i class="fa fa-lg"></i>Subir Carta</button>
                </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Tabla Cartas de Terminacion</h3>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableCartas">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre Proyecto</th>
                                    <th>Periodo</th>
                                    <th>Asesor</th>
                                    <th>Documento</th>
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
        <div class="clearix"></div>
</main>
<script type="text/javascript">
 if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
 </script>
<?php
require_once 'includes/footer.php';
?>