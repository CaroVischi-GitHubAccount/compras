@extends('layouts.app')
<head>
    <script type="text/javascript" charset="utf8" src="{{URL::asset('js/jquery.min.js')}}"></script> 
</head>
@section('content')
<h2>Agregar Productos:</h2><br>
<form  action="{{ route('detallecompras.store') }}" method="post"  role="form" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Grupo :</span>
                    </div>
                    <select class="form-select" name="grupo" id="grupo">
                        <option value=''>Seleccione un grupo</option>
                        @foreach ($grupos as $g)
                            <option value="{{old('grupo',$g->id)}}">{{ $g->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                @error('grupo')
                    <div><b>{{$message}}</b></div>
                @enderror
            </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Familia :</span>
                            </div>
                            <select class="form-select" name="familia" id="familia">
                                <option value=''>Seleccione un familia</option>
                                    @foreach ($familias as $f)
                                        <option value="{{old('familia',$f->id)}}">{{ $f->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('familia')
                            <div><b>{{$message}}</b></div>
                        @enderror
                    </div>
                </div>
                                    </div>
                <div class="row">
                    <div class="col-sm-6">
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Producto :</span>
                            </div>
                            <select class="form-select" name="prod" id="prod">
                                <option value=''>Seleccione el producto</option>
                            </select>
                        
                        </div>
                        @error('prod')
                                <div><b>{{$message}}</b></div>
                            @enderror
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Cant. (cajas):</span>
                            </div>
                            <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='cant' id='cant' value="{{old('cant','1')}}" oninput="calcularImporte()">
                            
                        </div>
                        @error('cant')
                        <div><b>{{$message}}</b></div>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> P. Unit. :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='PU' id='PU' value="{{old('PU')}}" oninput="calcularImporte()">
                            
                        </div>
                        @error('PU')
                        <div><b>{{$message}}</b></div>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Importe :$</span>
                            </div>
                            <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='importe' id='importe' value="" readonly>
                        </div>
                    </div>
        <div class="row">
            <div class="col text-center"><br>
                <button id='enviar' class="btn btn-outline-primary"  type="submit">Agregar</button>
            </div>
        </div>
</form>
                <hr>
                <h2>Lista de Productos Agregados:</h2>
                <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- table-->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>                             
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Importe</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($detalle_compras ->isNotEmpty())
                                            @foreach ($detalle_compras as $dc)
                                                <tr>
                                                    <td>{{ $dc->producto }}</td>
                                                    <td>{{ $dc->cant }}</td>
                                                    <td>{{ $dc->pcio_unit }}</td>
                                                    <td>{{ $dc->importe }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-outline-danger" href="#ModalDeleteDetalleCompra{{$dc->id}}" data-bs-toggle="modal">
                                                            <img src="{{URL::asset('img/10741561.png')}}" height=22px width=22px alt="Eliminar">
                                                        </a>
                                                            @include('compras/detalle_delete')
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
                    </div>
                    </div>
                </div>
            </div><!--endrow!-->
        <hr>
@endsection

<script>
    $(document).ready(function () {
        $('#grupo, #familia').on('change', function () {
            var id_grupo = $('#grupo').val();
            var id_flia = $('#familia').val();
            console.log(id_grupo,'', id_flia);
            // Realiza una petición AJAX para obtener los productos según grupo y familia
            $.ajax({
                //url: '/get-products', // Ruta que manejará la lógica de carga de productos
                url:'/get_prods',
                method: 'GET',
                //dat:{nombre del select: dato/valor que va en este lugar}
                data: { grupo: id_grupo, familia: id_flia },
                success: function (response) {
                    // Llena el tercer select con las opciones de productos
                    $('#prod').html(response);
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    });


    function calcularImporte() {
        var cantidad = parseFloat(document.getElementById('cant').value);
        var precioUnitario = parseFloat(document.getElementById('PU').value);
        var importeTotal = cantidad * precioUnitario;

        document.getElementById('importe').value = importeTotal.toFixed(2); // Redondea a 2 decimales
    }
</script>

