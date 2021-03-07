<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_empresa.php';

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>BANCO DE PROYECTOS</h1>
            <hr class="red"></hr>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableProyectos">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Empresa</th>
                                    <th>Informacion</th>
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