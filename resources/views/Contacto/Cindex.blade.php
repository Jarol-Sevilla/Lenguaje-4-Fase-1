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
        <center><b><i><u>Lista de Contactos</u></i></b></center>
    </h1>

    <div class="container">
        <h5>
            <center>BUSCAR</center>
        </h5>
        <div class="row" ALIGN="center">
            <div class="col-xl-12" ALIGN="center">
                <form action="{{ route('contacto.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="buscar" value="{{$ContactoBuscar}}">
                        </div>
                        <div class="col-auto">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Buscar">
                            <a class="btn btn-success" href="{{ route('contacto.index') }}">Volver</a>
                            <a href="{{ route('contacto.crear') }}" class="btn btn-warning">Crear</a>
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
                <center>NOMBRE</center>
            </th>
            <th>
                <center>APELLIDO</center>
            </th>
            <th>
                <center>CORREO ELECTRONICO</center>
            </th>
            <th>
                <center>TELEFONO</center>
            </th>
            <th>
                <center>VER</center>
            </th>
            <th>
                <center>EDITAR</center>
            </th>
            <th>
                <center>BORRAR</center>
            </th>

            </thead>
            <tbody>
            @forelse($contactos as $contacto)
                <tr>
                    <td class="table-dark">
                        <center>{{$contacto->id}}</center>
                    </td>
                    <td>
                        <center>{{$contacto->nombre}}</center>
                    </td>
                    <td>
                        <center>{{$contacto->apellido}}</center>
                    </td>
                    <td>
                        <center>{{$contacto->correo_electronico}}</center>
                    </td>
                    <td>
                        <center>{{$contacto->telefono}}</center>
                    </td>
                    <td>
                        <center><a class="btn btn-success" href="{{route('contacto.show', ['id'=>$contacto->id])}}"><u>Ver
                                    Datos</u></a></center>
                    </td>
                    <td>
                        <center><a class="btn btn-primary" href="{{route('contacto.editar', ['id'=>$contacto->id])}}"><u>Editar
                                    Datos</u></a></center>
                    </td>

                    <td>
                        <center>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{$contacto->id}}">
                                Eliminar Datos
                            </button>

                            <form method="post" action="{{route('contacto.borrar',[$contacto->id])}}">
                                @method("DELETE")
                                @csrf

                                <div class="modal" id="modal-{{$contacto->id}}" tabindex="-1">
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
                    <td>NO HAY CONTACTOS</td>
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
        {{ $contactos->render('pagination::bootstrap-4') }}
    </div>

@endsection()
