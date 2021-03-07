<!-- Modal Alumnos-->
<div class="modal fade" id="modalAlumno" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Alumno</h5>
                
                    
               
            </div>
            <div class="modal-body">
                <form id="formAlumno" name="formAlumno">
                    <input type="hidden" name="idalumno" id="idalumno" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" autofocus >
                    </div>
                    <div class="form-group">
                        <label for="control-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" >
                    </div>
                    <div class="form-group">
                        <label for="control-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" >
                    </div>
                    <div class="form-group">
                        <label for="control-label">Numero de control</label>
                        <input type="text" class="form-control" name="ncontrol" id="ncontrol" >
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
                    <label for="control-label">Semestre</label>
                            <select class="form-control" id="semestre" name="semestre">
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                            </select>
                        </div>
                    <div class="form-group">
                       
                        <input type="hidden" class="form-control" name="clave" id="clave">
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