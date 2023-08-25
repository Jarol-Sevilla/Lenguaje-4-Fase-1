@extends('Plantillas.plantilla')

@section('titulo','EDIT')

@section('contenido')

    <br><br>
    <form method="POST" action="{{route('contacto.update',[$contactos->id])}}" class0="needs-validation">
        @method("PUT")
        @csrf

        <div class="container" style="max-width: 600px;">
            <div class="card">
                <h4 class="card-header">
                    <center><b>
                            <ul>EDITAR DATOS DEL CONTACTO</ul>
                        </b></center>
                </h4>
                <div class="card">
                    <div class="card-body">

                        <div class="card-title">
                            <center><b>NOMBRE:</b>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                       name="nombre" id="nombre" placeholder="Ingrese el Nuevo Nombre"
                                       value="{{old('nombre') ?? $contactos->nombre}}">

                                @error('nombre')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <div class="card-title">
                            <center><b>APELLIDO:</b>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                       name="apellido" id="apellido" placeholder="Ingrese el Nuevo Apellido"
                                       value="{{old('apellido') ?? $contactos->apellido}}">

                                @error('apellido')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <div class="card-title">
                            <center><b>CORREO ELECTRONICO:</b>
                                <input type="text" class="form-control @error('correo_electronico') is-invalid @enderror"
                                       name="correo_electronico" id="correo_electronico" placeholder="Ingrese el Nuevo Correo Electronico"
                                       value="{{old('correo_electronico') ?? $contactos->correo_electronico}}">

                                @error('correo_electronico')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <div class="card-title">
                            <center><b>Telefono:</b>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror"
                                       name="telefono" id="telefono"  placeholder="Ingrese el Nuevo telefono"
                                       value="{{old('telefono') ?? $contactos->telefono}}">

                                @error('telefono')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <br>

                        <div>
                            <center>
                                <input type="submit" class="btn btn-primary" value="Editar">
                                <a href="{{ route('contacto.index') }}" class="btn btn-success">Volver</a>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection()
