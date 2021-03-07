<!-- Modal Residencia-->
<div class="modal fade" id="modalResidencia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nueva Residencia</h5>
                
                   
            </div>
            <div class="modal-body">
                <form id="formResidencia" name="formResidencia">
                    <input type="hidden" name="idResidencia" id="idResidencia" value="">
                    <div class="form-group">
                        <label for="control-label">Anteproyecto</label>
                        <select class="form-control" name="idAnteproyecto" id="idAnteproyecto">
                        <option selected > </option>
                            <!-- contenido ajax-->
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="control-label">Nombre Asesor</label>
                        <select class="form-control" name="idAsesor" id="idAsesor">
                            <!-- contenido ajax-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Fecha  de inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Fecha de terminacion</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                    </div> 
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="1">En progreso</option>
                            <option value="2">Finalizada</option>
                        </select>
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
