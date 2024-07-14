@extends('layouts.app')
<!--@extends('compras.createCompra')-->

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <strong>{{ __('Crear registro de compra') }}</strong>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="box box-info padding-1">
    <div class="box-body">
        <br>
                <form  action="{{ route('compras.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
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
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Tipo de Comprobante :</span>
                                </div>
                                    <select class="form-select" name="tipo_comprob" id="tipo_comprob">
                                        <option value=''>Seleccione</option>
                                        <option value='Fact.A'>Fact.A</option>
                                        <option value='Fact.B'>Fact.B</option>
                                        <option value='Fact.C'>Fact.C</option>
                                        <option value='NC'>Nota Crédito</option>
                                        <option value='ND'>Nota Débito</option>
                                        <option value='Presup'>Presupuesto</option>

                                    </select>
                            </div>
                            @error('tipo_comprob')
                                <span><b>{{$message}}</b></span><br> 
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Número :</span>
                                </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                    name='nro' id='nro' value="{{old('nro')}}">
                                </div>
                                    @error('nro')
                                    <span><b>{{$message}}</b></span><br> 
                                    @enderror
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Fecha Emisión :</span>
                                </div>
                                    <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                    name='fecha_emic' id='fecha_emic' value="{{old('fecha_emic')}}">
                                </div>
                                    @error('fecha_emic')
                                    <span><b>{{$message}}</b></span><br> 
                                    @enderror
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"> Fecha Vencimiento :</span>
                                </div>
                                    <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                    name='fecha_vto' id='fecha_vto' value="{{old('fecha_vto')}}">
                                </div>
                        </div>
                    </div>
    <hr>
    <h1>Detalle de Compra</h1>
        <div class=container>
            @yield('content')
        </div>
    <hr>
    <h1>Pie Comprobante</h1>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Subtotal :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='subtot' id='subtot' value="0.00" readonly>
                        </div>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Bonificación :%</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='bonif' id='bonif' value="0.00">
                        </div>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Recargo :%</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='recargo' id='recargo' value="0.00">
                        </div>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">IVA :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='iva' id='iva' value="0.00">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Retención :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='ret' id='ret' value="0.00">
                        </div>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Otros Impuestos :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='gastos' id='gastos' value="0.00">
                        </div>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Otros Gastos :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='gastos' id='gastos' value="0.00">
                        </div>
    <div class="col-sm-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Total :$</span>
                            </div>
                            <input type="number" step='any' class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                            name='total' id='total' value="0.00" readonly>
                        </div>
    <hr>
                
                <br>
                <div class="box-footer mt20">
                    <button  id= guardar type="submit" class="btn btn-primary float-end" >Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection


