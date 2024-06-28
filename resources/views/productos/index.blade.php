@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('productos.create') }}" class="btn btn-primary my-2 my-sm-0 float-end">Nuevo Producto </a>
            <div class='col-sm-6'>
                <form  action="{{ route('productos.buscador') }}" method="GET"  role="form" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name='busqueda' id='busqueda' aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <button class="btn btn-outline-primary"  type="submit">Buscar</button>
                    </div>
                </form>
            </div>
            <br>
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">
                        <h4><strong>{{ __('Productos') }}</strong></h4>
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

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- table-->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>                             
                                            <th>EAN</th>
                                            <th>Grupo</th>
                                            <th>Familia</th>
                                            <th>Nombre</th>
                                            <th>Proveedor</th>
                                            <th>Stock Min.</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $p)
                                            <tr>
                                                <td>{{ $p->EAN }}</td>
                                                <td>{{ $p->grupo }}</td>
                                                <td>{{ $p->flia }}</td>
                                                <td>{{ $p->descrip }}</td>
                                                <td>{{ $p->proveedor}}</td>
                                                <td>{{ $p->stock_min }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('productos.show',$p->id)}}">
                                                        <img src="{{URL::asset('img/3917112.png')}}" height=22px width=22px alt="Ver"></a>
                                                    </a> 
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('productos.edit',$p->id)}}" >
                                                        <img src="{{URL::asset('img/10742923.png')}}" height=22px width=22px alt="Editar"></a>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-danger" href="#ModalDeleteProd{{$p->id}}" data-bs-toggle="modal">
                                                        <img src="{{URL::asset('img/10741561.png')}}" height=22px width=22px alt="Eliminar">
                                                    </a>
                                                            @include('productos/m_delete')
                                                </td>
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
                    </div>
                </div>
            </div><!--endrow!-->
    </div>
@endsection
