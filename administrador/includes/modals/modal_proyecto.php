<!-- Modal Proyectos-->
<div class="modal fade" id="modalProyecto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Proyecto</h5>
               
                    
            </div>
            <div class="modal-body">
                <form id="formProyecto" name="formProyecto">
                    <input type="hidden" name="idproyecto" id="idproyecto" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="listTipo">Tipo</label>
                        <select class="form-control" name="listTipo" id="listTipo">
                            <option value="1">Interno</option>
                            <option value="2">Externo</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="control-label">Empresa</label>
                        <select class="form-control" name="listEmpresa" id="listEmpresa">
                            <!-- contenido ajax-->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="listEstado">Estado</label>
                        <select class="form-control" name="listEstado" id="listEstado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
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