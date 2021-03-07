<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_empresa.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>LISTA DE EMPRESAS</h1>
            <hr class="red"></hr>
        </div>
        <button class="btn btn-primary " type="button" onclick="openModalempresa()"> Nueva Empresa</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableEmpresas">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>RFC</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Responsable</th>
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