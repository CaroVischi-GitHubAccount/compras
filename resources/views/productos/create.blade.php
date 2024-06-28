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
                                    <select class="form-select" name="grupo" id="grupo" required="required">
                                        <option value='0'>Seleccione un grupo</option>
                                            @foreach ($grupos as $grupo)
                                                <option value="{{$grupo->id}}">{{ $grupo->nombre}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Familia :</span>
                                </div>
                                    <select class="form-select" name="familia" id="familia" required="required">
                                        <option value='0'>Seleccione una familia</option>
                                            @foreach ($familias as $flia)
                                                <option value="{{$flia->id}}">{{ $flia->nombre}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Proveedor :</span>
                        </div>
                            <select class="form-select" name="proveedor" id="proveedor" required="required">
                                <option value='0'>Seleccione un proveedor</option>
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
                            name='EAN' id='EAN' required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Stock Mínimo :</span>
                            </div>
                            <input type="number" min="1" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='stock_min' id='stock_min' required>
                        </div>
                    </div>
                </div>    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Descripción :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='descrip' id='descrip' required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"> Observaciones :</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                        name='observ' id='observ'>
                    </div>
                <div class="row">
                    <div class="col-sm-6">    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 1 :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='sinonimo1' id='sinonimo1' >
                        </div>
                    </div>
                    <div class="col-sm-6">    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sinónimo 2 :</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='sinonimo2' id='sinonimo2' >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Margen : %</span>
                                </div>
                            <input type="number" min= 1 class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='margen' id='margen' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Flete : $</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                name='flete' id='flete' >
                            </div>
                        </div>
                    </div>
                <br>
                <div class="box-footer mt20">
                    <button  id= enviar type="submit" class="btn btn-primary float-end" disabled="disabled" >Guardar</button>
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




</script>
