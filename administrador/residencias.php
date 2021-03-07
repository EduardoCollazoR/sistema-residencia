<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_residencias.php';
require_once 'includes/modals/modal_edit_residencias.php';
require_once 'includes/modals/modal_table-residencias.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>RESIDENCIAS</h1>
            <hr class="red"></hr>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalResidencia()"> Nueva residencia</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableResidencia">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre Proyecto</th>
                                    <th>Tipo</th>
                                    <th>Periodo</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Terminacion</th>
                                    <th>Numero de control</th>
                                    <th>Alumno</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Asesor</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Estado</th>
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