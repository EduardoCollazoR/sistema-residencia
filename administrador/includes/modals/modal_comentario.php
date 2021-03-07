<!-- Modal Comentarios-->
<div class="modal fade" id="modalComentarios" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Agregar Comentario</h5>
                
                  
               
            </div>
            <div class="modal-body">
                <form id="formComentario" name="formComentario">
                    <input type="hidden" name="idDocumento" id="idDocumento" value="">
                    <input type="hidden" name="mime" id="mime" value="">
                    <div class="form-group">
                        <label for="control-label">Nombre</label>
                        <input type="text" disabled class="form-control" name="archivo" id="archivo">
                    </div>
                    <div class="form-group">
                        <label for="control-label">Comentario</label>
                        <textarea type="text"rows="4" class="form-control" name="comentarios" id="comentarios"></textarea>
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