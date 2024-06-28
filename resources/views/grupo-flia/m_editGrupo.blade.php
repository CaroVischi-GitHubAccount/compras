<div class="modal fade" id="ModalEditGrupo{{$g->id}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form  action="{{ route('grupos.update', $g->id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Nombre :</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='nombre' id='nombre' value='{{$g->nombre}}' required>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>