<!-- Modal Residencia-->
<div class="modal fade" id="modaleditResidencia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Editar Residencia</h5>
               
                    
                
            </div>
            <div class="modal-body">
                <form id="formResidencia2" name="formResidencia2">
                    <input type="hidden" name="Residencia" id="Residencia" value="">
                    <input type="hidden" name="Anteproyecto" id="Anteproyecto" value="">
                    <div class="form-group">
                        <label for="control-label">Proyecto</label>
                        <input type="text" class="form-control" name="proyecto" id="proyecto" disabled>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Alumno</label>
                        <input type="text" class="form-control" name="alumno" id="alumno" disabled>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Nombre Asesor</label>
                        <select class="form-control" name="Asesor" id="Asesor">
                            <!-- contenido ajax-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Fecha inicio</label>
                        <input type="date" class="form-control" name="fechainicio" id="fechainicio">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Fecha terminacion</label>
                        <input type="date" class="form-control" name="fechafin" id="fechafin">
                    </div> 
                    <div class="form-group">
                        <label for="estatus">Estado</label>
                        <select class="form-control" name="estatus" id="estatus">
                            <option value="1">En progreso</option>
                            <option value="2">Finalizada</option>
                        </select>
                    </div>                   
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" id= "action2" type="submit">Guardar</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>