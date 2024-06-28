<div class="modal fade" id="ModalDeleteProv{{$p->id}}"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('proveedores.delete', $p->id) }}" method="get" role="form" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                    <div class="box-body">
                        <p>¿Estás seguro que deseas eliminar este registro?</p>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Nombre :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='nombre' id='nombre' value='{{$p->nombre}}' readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> CUIT :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='cuit' id='cuit' value='{{$p->cuit}}' readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Estado :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='estado' id='estado' value='{{$p->estado}}' readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Dirección :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='dir' id='dir' value='{{$p->dir}}' readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Teléfono :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='tel' id='tel' value='{{$p->tel}}' readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Mail :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='mail' id='mail' value='{{$p->mail}}' readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Localidad :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='localidad' id='localidad' value='{{$p->localidad}}' readonly>
                    </div>
                    <br>
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