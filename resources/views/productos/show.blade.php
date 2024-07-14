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
                                <strong>{{ __('Producto') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="box box-info padding-1">
    <div class="box-body">
        <br>
        <div class="row">
        @foreach ($producto as $prod)
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Grupo :</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='grupo' id='grupo' value="{{$prod->grupo}}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Familia :</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='flia' id='flia' value="{{$prod->flia}}" readonly>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"> Proveedor :</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                name='proveedor' id='proveedor' value="{{$prod->proveedor}}" readonly>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> EAN :</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='EAN' id='EAN' value="{{$prod->EAN}}" readonly>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Stock Mínimo :</span>
                    </div>
                    <input type="number" min="1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='stock_min' id='stock_min' value="{{$prod->stock_min}}" readonly>
                </div>
            </div>
        </div>    
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"> Descripción :</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
            name='descrip' id='descrip' value="{{$prod->descrip}}" readonly>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"> Observaciones :</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
            name='observ' id='observ' value="{{$prod->observ}}" readonly>
        </div>
        <div class="row">
            <div class="col-sm-6">    
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 1 :</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='sinonimo1' id='sinonimo1' value="{{$prod->sinonimo1}}" readonly >
                </div>
            </div>
            <div class="col-sm-6">    
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 2 :</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='sinonimo2' id='sinonimo2' value="{{$prod->sinonimo2}}" readonly >
                </div>
            </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default"> Margen : %</span>
                    </div>
                <input type="number" min= 1 class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                name='margen' id='margen' value="{{$prod->margen}}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default"> Flete : $</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                    name='flete' id='flete' value="{{$prod->flete}}" readonly>
                </div>
            </div>
        </div>
    @endforeach
    <br>
    <div class="box-footer mt20"></div>
</div>
</div>
</div>
</div>
</div>
@endsection
