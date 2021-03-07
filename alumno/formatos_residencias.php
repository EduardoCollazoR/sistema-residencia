<?php
require_once 'includes/header.php';

require_once '../includes/conexion.php';

if(empty($_POST['nombre']) || empty($_FILES['user_file'])){
    
}elseif (isset($_POST['action'])){
$nombre_archivo = $_POST['nombre'];
$name= $_FILES['user_file']['name'];
$type= $_FILES['user_file']['type'];
$data = file_get_contents($_FILES['user_file']['tmp_name']);
$sql = 'INSERT INTO formatos(nombre_archivo,archivo,mime,datos) VALUES(?,?,?,?)';
$query = $pdo->prepare($sql); 
$query->execute(array($nombre_archivo,$name,$type,$data));

}

?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>FORMATOS DE RESIDENCIA</h1>
            <hr class="red"></hr>
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
<?php
require_once 'includes/footer.php';
?>