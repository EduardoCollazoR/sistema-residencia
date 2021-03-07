<!-- Modal anteproyectos-->
<div class="modal fade" id="modalAnteproyecto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Editar anteproyecto</h5>
                
                    
                
            </div>
            <div class="modal-body">
                <form id="formAnteproyecto" name="formAnteproyecto">
                    <input type="hidden" name="idAnteproyecto" id="idAnteproyecto"  value="">
                    <input type="hidden" name="ncontrol" id="ncontrol">
                    <input type="hidden" name="periodo_id" id="periodo_id">
                    <input type="hidden" name="fecha" id="fecha">
                    <div class="form-group">
                        <label for="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="listPeriodo">Tipo de anteproyecto</label>
                        <select class="form-control" name="tipo" id="tipo"> 
                        <option value="1">Interno</option>
                        <option value="2">Externo</option>  
                        </select>
                
                    </div>
                    <div class="form-group">
                        <label for="listEstado">Estado</label>
                        <select class="form-control" name="listEstado" id="listEstado">
                            <option value="1">Pendiente</option>
                            <option value="2">Aceptado</option>
                            <option value="3">Finalizado</option>
                        </select>
                    </div>                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" id= "actualizar" type="submit">Actualizar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>