<!-- Modal Anteproyecto -->
<div class="modal fade" id="modalAnteproyecto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Alta de Anteproyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAnteproyecto" name="formAnteproyecto">
                    <input type="hidden" name="idanteproyecto" id="idanteproyecto" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre del Anteproyecto</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="ncontrol" id="ncontrol" value="<?=$_SESSION['alumno_id'];?>">
                    </div>
                    <div class="form-group"> 
                    
                        <input type="hidden" class="form-control" name="fecha" id="fecha">
                    </div>
                    <div class="form-group">
                        <label for="listPeriodo">Periodo</label>
                        <select class="form-control" name="listPeriodo" id="listPeriodo">   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="listPeriodo">Tipo de anteproyecto</label>
                        <select class="form-control" name="listTipo" id="listTipo"> 
                        <option value="1">Interno</option>
                        <option value="2">Externo</option>
                                
                            </select>
                
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="listEstado" id="listEstado" value="1">
                      
                    </div>                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" id= "action" type="submit">Guardar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>