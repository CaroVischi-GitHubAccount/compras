<div class="modal fade" id="ModalCreateProv"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="{{ route('proveedores.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Nombre :</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='nombre' id='nombre' value="{{old('nombre')}}">
                    </div>
                    @error('nombre')
                        <span><b>{{$message}}</b></span><br> 
                    @enderror
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> CUIT :</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='cuit' id='cuit' value="{{old('cuit')}}">
                    </div>
                    @error('cuit')
                        <span><b>{{$message}}</b></span><br> 
                    @enderror
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Dirección :</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='dir' id='dir' value="{{old('dir')}}">
                    </div>
                    @error('dir')
                        <span><b>{{$message}}</b></span><br> 
                    @enderror
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Teléfono :</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='tel' id='tel' value="{{old('tel')}}">
                    </div>
                    @error('tel')
                        <span><b>{{$message}}</b></span><br> 
                    @enderror
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Mail :</span>
                    </div>
                        <input type="mail" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='mail' id='mail' value="{{old('mail')}}">
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Localidad :</span>
                    </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='localidad' id='localidad' value="{{old('localidad')}}">
                    </div>
                    @error('localidad')
                        <span><b>{{$message}}</b></span><br> 
                    @enderror
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>