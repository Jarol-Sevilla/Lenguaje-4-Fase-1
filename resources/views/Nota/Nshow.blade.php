
@extends('Plantillas.plantilla')

@section('titulo','Show')

@section('contenido')

    <br>
    <br>
    <div class="container" style="max-width: 600px;">

        <div class="card">
            <h4 class="card-header">
                <center><b>
                        <ul>DATOS DE LAS NOTAS</ul>
                    </b></center>
            </h4>
            <div class="card">
                <div class="card-body">

                    <p class="card-title">
                    <center><b>TEXTO:</b><br>
                        {{$nota->texto}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>FECHA:</b><br>
                        {{$nota->fecha}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>CONTACTO ID:</b><br>
                        {{$nota->contacto_id}}</center>
                    </p>

                    <div>
                        <center>
                            <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
