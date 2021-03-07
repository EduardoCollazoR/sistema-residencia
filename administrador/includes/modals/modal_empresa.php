<!-- Modal Empresas-->
<div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nueva Empresa</h5>
               
                   
                
            </div>
            <div class="modal-body">
                <form id="formEmpresa" name="formEmpresa">
                    <input type="hidden" name="idempresa" id="idempresa" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="control-label">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="control-label">RFC</label>
                        <input type="text" class="form-control" name="rfc" id="rfc">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Telefono</label>
                        <input type="tel" class="form-control" name="tel" id="tel">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Responsable</label>
                        <input type="text" class="form-control" name="responsable" id="responsable">
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