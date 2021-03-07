<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_table-anteproyectos.php';
require_once 'includes/modals/modal_anteproyectos.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>ANTEPROYECTOS</h1>
            <hr class="red"></hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableAnteproyectos">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre Proyecto</th>
                                    <th>Periodo</th>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>No Control</th>
                                    <th>Estado</th>
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
    <?php
require_once 'includes/copy.php';
?>
</main>

<?php
require_once 'includes/footer.php';
?>