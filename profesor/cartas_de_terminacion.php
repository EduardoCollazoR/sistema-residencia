<?php
require_once 'includes/header.php';

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>CARTAS DE TERMINACION</h1>
            <hr class="red"></hr>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableCartas">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre Proyecto</th>
                                    <th>Periodo</th>
                                    <th>Alumno</th>
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
    </div>
    <br>
</main>

<?php
require_once 'includes/footer.php';
?>