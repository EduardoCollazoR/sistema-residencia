<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_alumno.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>LISTA DE ALUMNOS</h1>
            <hr class="red"></hr>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalalumno()">Nuevo Alumno</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableAlumnos">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>No Control</th>
                                    <th>Correo Institucional</th>
                                    <th>Semestre</th>
                                    <th>Telefono</th>
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