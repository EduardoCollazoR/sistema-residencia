<?php
require_once 'includes/header.php';
require_once 'includes/modals/modal_periodo.php';
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1>PERIODOS</h1>
            <hr class="red"></hr>
        </div>
        <button class="btn btn-primary " type="button" onclick="openModalPeriodo()"> Nuevo Periodo</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablePeriodos" name="tablePeriodos">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
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