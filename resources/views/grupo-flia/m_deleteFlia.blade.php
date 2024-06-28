<div class="modal fade" id="ModalDeleteFlia{{$f->id}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('flia.delete', $f->id) }}" method="get" role="form" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                    <div class="box-body">
                        <p>¿Estás seguro que deseas eliminar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>