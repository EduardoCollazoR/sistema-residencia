<?php
require_once 'includes/header.php';
require_once '../includes/conexion.php';

if(!isset($_POST['action'])){
   
    $accion = 1;
}elseif (isset($_POST['action']) && !empty($_POST['nombre'])  && $_FILES['user_file']['name']!=null ){
$nombre_archivo = $_POST['nombre'];
$name= $_FILES['user_file']['name'];
$type= $_FILES['user_file']['type'];
$data = file_get_contents($_FILES['user_file']['tmp_name']);

$sql = 'INSERT INTO formatos(nombre_archivo,archivo,mime,datos) VALUES(?,?,?,?)';
$query = $pdo->prepare($sql); 
$query->execute(array($nombre_archivo,$name,$type,$data));
$accion = 2;

}






?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Formatos de Residencia</h1>
            <hr class="red"></hr>
        </div>
    </div>
    <div class="tile">
    <h3 class="tile-title">Documentos</h3>
    <div class="tile-body">
    <form method="POST" id="formFormato" name="formFormato" enctype="multipart/form-data" class="form-inline">
                    <input type="hidden" name="idArchivo" id="idArchivo" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre del Archivo</label>
                        &nbsp;
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        
                    <label for="control-label"> Archivo</label>
                    &nbsp;
                        <input  class="form-control" type="file" name="user_file" id="user_file" accept="application/pdf" />   
                    
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary" name="action" id= "action">Guardar</button>  
                    <div id="message"></div> 
</form>
    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableFormatos">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Archivo</th>
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
    <?php
require_once 'includes/copy.php';
?>
</main>
<script type="text/javascript">
 if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
 </script>
<?php
require_once 'includes/footer.php';
?>