@extends('Plantillas.plantilla')

@section('titulo','index')

@section('contenido')

    @if(session('mensaje'))
        <div class="alert alert-success d-flex align-items-center position-relative" role="alert">
            {{session('mensaje')}}
            <button type="button" class="btn-close position-absolute top-1 end-0" data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    <br>
    <h1>
        <center><b><i><u>Lista de Eventos</u></i></b></center>
    </h1>

    <div class="container">
        <h5>
            <center>BUSCAR</center>
        </h5>
        <div class="row" ALIGN="center">
            <div class="col-xl-12" ALIGN="center">
                <form action="{{ route('evento.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="buscar" value="{{$EventoBuscar}}">
                        </div>
                        <div class="col-auto">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Buscar">
                            <a class="btn btn-success" href="{{ route('evento.index') }}">Volver</a>
                            <a href="{{ route('evento.crear') }}" class="btn btn-warning">Crear</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <table class="table table-bordered border-black" class>
            <thead class="table-dark">
            <th class="table-dark">
                <center>ID</center>
            </th>
            <th>
                <center>TITULO</center>
            </th>
            <th>
                <center>DESCRIPCION</center>
            </th>
            <th>
                <center>FECHA DE INICIO</center>
            </th>
            <th>
                <center>FECHA DE CIERRE</center>
            </th>
            <th>
                <center>CONTACTO ID</center>
            </th>
            </thead>
            <tbody>
            @forelse($eventos as $evento)
                <tr>
                    <td class="table-dark">
                        <center>{{$evento->id}}</center>
                    </td>
                    <td>
                        <center>{{$evento->titulo}}</center>
                    </td>
                    <td>
                        <center>{{$evento->descripcion}}</center>
                    </td>
                    <td>
                        <center>{{$evento->fecha_inicio}}</center>
                    </td>
                    <td>
                        <center>{{$evento->fecha_cierre}}</center>
                    </td>
                    <td>
                        <center>{{$evento->contacto_id}}</center>
                    </td>
                    <td>
                        <center><a class="btn btn-success" href="{{route('evento.show', ['id'=>$evento->id])}}"><u>Ver
                                    Datos</u></a></center>
                    </td>
                    <td>
                        <center><a class="btn btn-primary" href="{{route('evento.editar', ['id'=>$evento->id])}}"><u>Editar
                                    Datos</u></a></center>
                    </td>

                    <td>
                        <center>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{$evento->id}}">
                                Eliminar Datos
                            </button>

                            <form method="post" action="{{route('evento.borrar',[$evento->id])}}">
                                @method("DELETE")
                                @csrf

                                <div class="modal" id="modal-{{$evento->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Eliminar este Dato</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿QUIERE ELIMINAR PERMANENTEMENTE ESTE DATO?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    No
                                                </button>
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </center>
                    </td>

                </tr>
            @empty
                <tr>
                    <td>NO HAY EVENTOS</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
    <br>

    <style>
        .custom-center {
            display: flex;
            justify-content: center;
        }
    </style>

    <div class="custom-center">
        {{ $eventos->render('pagination::bootstrap-4') }}
    </div>

@endsection()
