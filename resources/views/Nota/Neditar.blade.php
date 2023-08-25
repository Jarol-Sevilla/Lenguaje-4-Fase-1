@extends('Plantillas.plantilla')

@section('titulo','EDIT')

@section('contenido')

    <br><br>
    <form method="POST" action="{{route('nota.update',[$notas->id])}}" class0="needs-validation">
        @method("PUT")
        @csrf

        <div class="container" style="max-width: 600px;">
            <div class="card">
                <h4 class="card-header">
                    <center><b>
                            <ul>EDITAR DATOS DE LAS NOTAS</ul>
                        </b></center>
                </h4>
                <div class="card">
                    <div class="card-body">

                        <div class="card-title">
                            <center><b>TEXTO:</b>
                                <input type="text" class="form-control @error('texto') is-invalid @enderror"
                                       name="texto" id="texto" placeholder="Ingrese el Nuevo Texto"
                                       value="{{old('texto') ?? $notas->texto}}">

                                @error('texto')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <div class="card-title">
                            <center><b>FECHA:</b>
                                <input type="text" class="form-control @error('fecha') is-invalid @enderror"
                                       name="fecha" id="fecha" placeholder="Ingrese la Nueva Fecha"
                                       value="{{old('fecha') ?? $notas->fecha}}">

                                @error('fecha')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <div class="card-title">
                            <center><b>CONTACTO ID:</b>
                                <input type="text" class="form-control @error('contacto_id') is-invalid @enderror"
                                       name="contacto_id" id="contacto_id" placeholder="Ingrese el Nuevo id del contacto"
                                       value="{{old('contacto_id') ?? $notas->contacto_id}}">

                                @error('contacto_id')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <br>

                        <div>
                            <center>
                                <input type="submit" class="btn btn-primary" value="Editar">
                                <a href="{{ route('nota.index') }}" class="btn btn-success">Volver</a>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection()
