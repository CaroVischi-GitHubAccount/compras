@extends('adminlte::page')

@section('title', 'Inventario')

{{-- @section('content_header')
    <h3>Inventario</h3>
@stop --}}

@section('content')
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h4><strong>{{ __('Inventario') }}</strong></h4>
                            </span>
                            <br>
                        </div>
                    </div>
                </div>

                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <span>{{ $message }}</span>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <span>{{ $message }}</span>
                    </div>
                @endif
                <br>

                <div class="card">
                    <div class="card-header pb-2">
                        <div class='col-sm-6 mt-3'>
                            <form  action="#" method="GET"  role="form" enctype="multipart/form-data">
                            @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name='busqueda' id='busqueda' aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                    <button class="btn btn-outline-primary"  type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>           
                    </div>
    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>                             
                                        <th>Proveedor</th>
                                        {{-- <th>Descrip.</th> --}}
                                        {{-- <th>Cod. interno</th> --}}
                                        <th>Stock</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Operación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventario as $inv)
                                        <tr>
                                            <td>{{ $inv -> proveedores -> nombre}}</td>
                                            <td>{{ $inv -> stock}}</td>
                                            <td>{{ $inv -> fecha}}</td>
                                            <td>{{ $inv -> total}}</td>
                                            <td>{{ $inv -> tipo_op}}</td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- CSS --}}
    <style>
        
    </style>
@stop

@section('js')
    {{-- SCRIPT --}}
    <script>
       
    </script>
@stop