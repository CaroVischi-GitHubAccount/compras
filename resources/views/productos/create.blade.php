@extends('layouts.app')
<head>
    <script type="text/javascript" charset="utf8" src="{{URL::asset('js/jquery.min.js')}}"></script> 
</head>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <strong>{{ __('Crear registro de producto') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="box box-info padding-1">
    <div class="box-body">
        <br>
                <form  action="{{ route('productos.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Grupo :</span>
                                </div>
                                    <select class="form-select" name="grupo" id="grupo">
                                        <option value=''>Seleccione un grupo</option>
                                            @foreach ($grupos as $grupo)
                                                <option value="{{old('grupo', $grupo->id)}}">{{ $grupo->nombre}}</option>
                                            @endforeach
                                    </select>
                            </div>
                            @error('grupo')
                                <span><b>{{$message}}</b></span><br> 
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Familia :</span>
                                </div>
                                    <select class="form-select" name="familia" id="familia">
                                        <option value=''>Seleccione una familia</option>
                                            @foreach ($familias as $flia)
                                                <option value="{{old('familia', $flia->id)}}">{{ $flia->nombre}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                    @error('familia')
                                    <span><b>{{$message}}</b></span><br> 
                                    @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Proveedor :</span>
                        </div>
                            <select class="form-select" name="proveedor" id="proveedor">
                                <option value=''>Seleccione un proveedor</option>
                                    @foreach ($proveedores as $p)
                                        <option value="{{old('proveedor',$p->id)}}">{{ $p->nombre}}</option>
                                    @endforeach
                            </select>
                    </div>
                        @error('proveedor')
                            <span><b>{{$message}}<b></span><br> 
                        @enderror
                <div class="row">
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> EAN :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='EAN' id='EAN' value="{{old('EAN')}}">
                        </div>
                        @error('EAN')
                            <span><b>{{$message}}</b></span><br> 
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Stock Mínimo :</span>
                            </div>
                            <input type="number" min="1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='stock_min' id='stock_min' value="{{old('stock_min','1')}}">
                            
                        </div>
                        @error('stock_min')
                        <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                    </div>
                </div>    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Descripción :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='descrip' id='descrip' value="{{old('descrip')}}">
                    
                    </div>
                        @error('descrip')
                            <span><b>{{$message}}</b></span><br> 
                        @enderror
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Observaciones :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='observ' id='observ' value="{{old('observ')}}">
                    
                    </div>
                        @error('observ')
                        <span><b>{{$message}}</b></span><br> 
                        @enderror
                <div class="row">
                    <div class="col-sm-6">    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 1 :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='sinonimo1' id='sinonimo1' value="{{old('sinonimo1')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 2 :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='sinonimo2' id='sinonimo2' value="{{old('sinonimo2')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Margen : %</span>
                                </div>
                                <input type="number"  step="any" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                name='margen' id='margen' value="{{old('margen','0.00')}}">
                            </div>
                                @error('margen')
                                <span><b>{{$message}}</b></span><br> 
                                @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Flete : $</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                name='flete' id='flete' value="{{old('flete','0.00')}}">
                            </div>
                            @error('flete')
                                <span><b>{{$message}}</b></span><br> 
                                @enderror
                        </div>
                    </div>
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


<script type='text/javascript'>

//grupo=document.getElementById("grupo");

/*$(document).ready(function(){
    $('#grupo').change (function(){
            let grupo_id = $(this).val();
            if(grupo_id != 0 ){ //validacion del select
                    $('#enviar').removeAttr('disabled');
                        }
                    });
                });

$(document).ready(function(){
$('#familia').change (function(){
    let flia_id = $(this).val();
    if(flia_id != 0 ){ //validacion del select
                //alert("seleccionar");
            $('#enviar').removeAttr('disabled');
        }
    });
});
$(document).ready(function(){
$('#proveedor').change (function(){
    let prov_id = $(this).val();
    if(prov_id != 0 ){ //validacion del select
                //alert("seleccionar");
            $('#enviar').removeAttr('disabled');
        }
    });
});
*/
//MEJORAR VALIDACION DE SELECTS
/*
$(document).ready(function(){
    $('#grupo').change (function(){
            let grupo_id = $(this).val();
    
        $('#familia').change (function(){
            let flia_id = $(this).val();

            $('#proveedor').change (function(){
            let prov_id = $(this).val();
                if(grupo_id!= 0 && flia_id!= 0 && prov_id!= 0 ){ //validacion del select
                    $('#enviar').removeAttr('disabled');
                }
            });
        });
    });
});
*/



</script>
