<!-- Modal Formatos -->
<div class="modal fade" id="modalFormato" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Nuevo Formato</h5>
                
                    
                
            </div>
            <div class="modal-body">
                <form  method = "post" id="formFormato" name="formFormato" enctype="multipart/formdata">
                    <input type="hidden" name="idarchivo" id="idarchivo" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre del Archivo</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Archivo</label>
                        <td><input class="input-group" type="file" name="archivo" id="archivo" accept="application/pdf" /></td>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" id= "action" type="submit">Subir Archivo</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>