<?php
require_once 'includes/header.php';
require_once 'includes/modals/modals.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>LISTA DE USUARIOS</h1>
            <hr class="red"></hr>
        </div>
        <button class="btn btn-primary" type="button" onclick="openModalusuario()"> Nuevo Usuario</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableUsuarios">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>No Control</th>
                                    <th>Correo Institucional</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
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