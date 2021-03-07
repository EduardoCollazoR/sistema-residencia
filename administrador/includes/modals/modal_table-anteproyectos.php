<!-- Modal documentos de anteproyectos-->
<?php
require_once 'modal_comentario.php'
?>
<div class="modal fade" id="modalTableAnteproyectos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Documentos</h5>
                    
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="tile-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="tableDocAnteproyectos">
                                            <thead>
                                                <tr>
                                                    <th>Acciones</th>
                                                    <th>Nombre</th>
                                                    <th>Archivo</th>
                                                    <th>Comentarios</th>
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
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>

<?php
require_once 'includes/footer.php';
?>