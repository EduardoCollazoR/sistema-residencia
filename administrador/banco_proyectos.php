<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_proyecto.php';
require_once 'includes/modals/modal_infoEmpresa.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>BANCO DE PROYECTOS</h1>
            <hr class="red"></hr>
        </div>
        <button class="btn btn-primary " type="button" onclick="openModalproyecto()"> Nuevo Proyecto</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableProyectos">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Empresa</th>
                                    <th>Descripcion</th>
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