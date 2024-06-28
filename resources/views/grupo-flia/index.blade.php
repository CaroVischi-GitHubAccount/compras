@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">
                        <h4><strong>{{ __('Grupos -- Familias') }}</strong></h4>
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
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nuevo Grupo</h5>
                                <form  action="{{ route('grupos.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"> Nombre :</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                            name='nombre' id='nombre' required>
                                    </div>
                                    <br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                            <br>
                            <!-- table-->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grupos as $g)
                                            <tr>
                                                <td>{{ $g->nombre }}</td>
                                                <td> 
                                                    <a class="btn btn-sm btn-outline-warning" href="#ModalEditGrupo{{$g->id}}" data-bs-toggle="modal">
                                                        <img src="{{URL::asset('img/10742923.png')}}" height=22px width=22px alt="Editar"></a>
                                                    </a>
                                                            @include('grupo-flia/m_editGrupo')
                                                    <a class="btn btn-sm btn-outline-danger" href="#ModalDeleteGrupo{{$g->id}}" data-bs-toggle="modal">
                                                        <img src="{{URL::asset('img/10741561.png')}}" height=22px width=22px alt="Eliminar">
                                                    </a>
                                                            @include('grupo-flia/m_deleteGrupo')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nueva Familia</h5>
                                <form  action="{{ route('flia.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"> Nombre :</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" 
                                            name='nombre' id='nombre' required>
                                    </div>
                                    <br>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                            <br>
                            <!-- table-->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($flias as $f)
                                            <tr>
                                                <td>{{ $f->nombre }}</td>
                                                <td> 
                                                    <a class="btn btn-sm btn-outline-warning" href="#ModalEditFlia{{$f->id}}" data-bs-toggle="modal">
                                                        <img src="{{URL::asset('img/10742923.png')}}" height=22px width=22px alt="Editar"></a>
                                                    </a>
                                                            @include('grupo-flia/m_editFlia')
                                                    <a class="btn btn-sm btn-outline-danger" href="#ModalDeleteFlia{{$f->id}}" data-bs-toggle="modal">
                                                        <img src="{{URL::asset('img/10741561.png')}}" height=22px width=22px alt="Eliminar">
                                                    </a>
                                                            @include('grupo-flia/m_deleteFlia')
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
            </div><!--endrow!-->





            
    </div>
@endsection
