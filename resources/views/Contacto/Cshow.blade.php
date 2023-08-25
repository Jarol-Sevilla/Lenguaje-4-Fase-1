@extends('Plantillas.plantilla')

@section('titulo','Show')

@section('contenido')

    <br>
    <br>
    <div class="container">

        <div class="card">
            <h4 class="card-header">
                <center><b>
                        <ul>DATOS DEL CONTACTO</ul>
                    </b></center>
            </h4>
            <div class="card">
                <div class="card-body">

                    <p class="card-title">
                    <center><b>NOMBRE:</b><br>
                        {{$contacto->nombre}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>APELLIDO:</b><br>
                        {{$contacto->apellido}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>CORREO ELECTRONICO:</b><br>
                        {{$contacto->correo_electronico}}</center>
                    </p>

                    <p class="card-title">
                    <center><b>TELEFONO:</b><br>
                        {{$contacto->telefono}}</center>
                    </p>

                    <div>
                        <center>
                            <a href="{{ route('contacto.index') }}" class="btn btn-success">Volver</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
