

<form  action="{{ route('productos.update', $p->id) }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Grupo :</span>
                        </div>
                            <select class="form-select" name="grupo" id="grupo" required="required">
                                <option>Seleccione un grupo</option>
                                    @foreach ($grupos as $grupo)
                                        <option value="{{$grupo->id}}">{{ $grupo->nombre}}</option>
                                    @endforeach
                            </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Familia :</span>
                        </div>
                            <select class="form-select" name="familia" id="familia" required="required">
                                <option>Seleccione una familia</option>
                                    @foreach ($flias as $flia)
                                        <option value="{{$flia->id}}">{{ $flia->nombre}}</option>
                                    @endforeach
                            </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Proveedor :</span>
                        </div>
                            <select class="form-select" name="proveedor" id="proveedor" required="required">
                                <option>Seleccione un proveedor</option>
                                    @foreach ($proveedores as $p)
                                        <option value="{{$p->id}}">{{ $p->nombre}}</option>
                                    @endforeach
                            </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> EAN :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='EAN' id='EAN' value='{{$p->EAN}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Descripción :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='descrip' id='descrip' value='{{$p->descrip}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Observaciones :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='observ' id='observ' value='{{$p->observ }}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Stock Mínimo :</span>
                        </div>
                        <input type="number" min= 1 class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='stock_min' id='stock_min' value='{{$p->stock_min}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 1 :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='sinonimo1' id='sinonimo1' value='{{$p->sinonimo1}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 2 :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='sinonimo2' id='sinonimo2' value='{{$p->sinonimo2}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Margen : %</span>
                        </div>
                        <input type="number" min= 1 class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='margen' id='margen' value='{{$p->margen}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Flete : $</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='flete' id='flete' value='{{$p->flete}}'>
                    </div>
                <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>