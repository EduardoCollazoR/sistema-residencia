<!-- Modal Usuarios -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Usuario</h5>
               
                    
            </div>
            <div class="modal-body">
                <form id="formUsuario" name="formUsuario">
                    <input type="hidden" name="idusuario" id="idusuario" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Numero de control</label>
                        <input type="text" class="form-control" name="ncontrol" id="ncontrol">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Correo Institucional</label>
                        <input type="email" class="form-control" name="correo" id="correo">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Telefono</label>
                        <input type="tel" class="form-control" name="tel" id="tel">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Contraseña</label>
                        <input type="password" class="form-control" name="clave" id="clave">
                    </div>
                    <div class="form-group">
                        <label for="listRol">Rol</label>
                        <select class="form-control" name="listRol" id="listRol">
                            <option value="1">Administrador</option>
                            <option value="2">Asistente</option>
                        </select>
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