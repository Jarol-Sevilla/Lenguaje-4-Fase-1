
@extends('Plantillas.plantilla')

@section('titulo','Show')

@section('contenido')

    <br>
    <br>
    <div class="container" style="max-width: 600px;">

        <div class="card">
            <h4 class="card-header">
                <center><b>
                        <ul>DATOS DEL EVENTO</ul>
                    </b></center>
            </h4>
            <div class="card">
                <div class="card-body">

                    <p class="card-title">
                    <center><b>TITULO:</b><br>
                        {{$evento->titulo}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>DESCRIPCION:</b><br>
                        {{$evento->descripcion}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>FECHA INICIO:</b><br>
                        {{$evento->fecha_inicio}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>FECHA CIERRE:</b><br>
                        {{$evento->fecha_cierre}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>CONTACTO ID:</b><br>
                        {{$evento->contacto_id}}</center>
                    </p>

                    <div>
                        <center>
                            <a href="{{ route('evento.index') }}" class="btn btn-success">Volver</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
