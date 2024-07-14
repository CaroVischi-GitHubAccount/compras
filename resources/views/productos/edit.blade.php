@extends('adminlte::page')

@section('title', 'Producto')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <strong>{{ __('Editar registro de producto') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="box box-info padding-1">
    <div class="box-body">
        <br>
        @foreach ($producto as $producto)
                <form  action="{{ route('productos.update' , $producto->id) }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Grupo :</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                value='{{$producto->grupo}}' readonly>
                                    <select class="form-select" name="grupo" id="grupo">
                                        <option value='0'>Cambiar Grupo</option>
                                            @foreach ($grupos as $grupo)
                                                <option value="{{$grupo->id}}">{{$grupo->nombre}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Familia :</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                value='{{$producto->flia}}' readonly>
                                    <select class="form-select" name="familia" id="familia">
                                        <option value='0'>Cambiar Familia</option>
                                            @foreach ($familias as $flia)
                                                <option value="{{$flia->id}}">{{$flia->nombre}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Proveedor :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        value='{{$producto->proveedor}}' readonly>
                            <select class="form-select" name="proveedor" id="proveedor">
                                <option value='0'>Cambiar Proveedor</option>
                                    @foreach ($proveedores as $p)
                                        <option value="{{$p->id}}">{{ $p->nombre}}</option>
                                    @endforeach
                            </select>
                    </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> EAN :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='EAN' id='EAN' value='{{$producto->EAN}}'>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Stock Mínimo :</span>
                            </div>
                            <input type="number" min="1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='stock_min' id='stock_min' value='{{$producto->stock_min}}'>
                        </div>
                    </div>
                </div>    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Descripción :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='descrip' id='descrip' value='{{$producto->descrip}}'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Observaciones :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='observ' id='observ' value='{{$producto->observ}}'>
                    </div>
                <div class="row">
                    <div class="col-sm-6">    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 1 :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='sinonimo1' id='sinonimo1' value='{{$producto->sinonimo1}}' >
                        </div>
                    </div>
                    <div class="col-sm-6">    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 2 :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='sinonimo2' id='sinonimo2' value='{{$producto->sinonimo2}}' >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Margen : %</span>
                                </div>
                            <input type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='margen' id='margen' value='{{$producto->margen}}'>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Flete : $</span>
                                </div>
                                <input type="number" step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                name='flete' id='flete' value='{{$producto->flete}}'>
                            </div>
                        </div>
                    </div>
    @endforeach
                <br>
                <div class="box-footer mt20">
                    <button  id= enviar type="submit" class="btn btn-primary float-end" >Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

