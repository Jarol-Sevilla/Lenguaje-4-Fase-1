@extends('Plantillas.plantilla')

@section('titulo','Create')

@section('contenido')

    <br><br>
    <form  method="POST" action="{{route('evento.crear')}}" class0="needs-validation">
        @csrf

        <div class="container" style="max-width: 600px;" >
            <div class="card">

                <h4 class="card-header"><center><b><ul>CREAR DATOS DEL EVENTO</ul></b></center></h4>
                <div class="card">
                    <div class="card-body">

                        <div class="card-title"><center><b>TITULO:</b>
                                <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                                       name="titulo"  id="titulo" placeholder="Ingrese El Titulo" value="{{old('titulo')}}">

                                @error('titulo')
                                <div class ="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div><br>

                        <div class="card-title"><center><b>DESCRIPCION:</b>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                       name="descripcion"  id="descripcion" placeholder="Ingrese la Descripcion" value="{{old('descripcion')}}">

                                @error('descripcion')
                                <div class ="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div><br>

                        <div class="card-title"><center><b>FECHA INICIO:</b>
                                <input type="text" class="form-control @error('fecha_inicio') is-invalid @enderror"
                                       name="fecha_inicio"  id="fecha_inicio" placeholder="Ingrese La fecha inicio" value="{{old('fecha_inicio')}}">

                                @error('fecha_inicio')
                                <div class ="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div><br>

                        <div class="card-title"><center><b>FECHA CIERRE:</b>
                                <input type="text" class="form-control @error('fecha_cierre') is-invalid @enderror"
                                       name="fecha_cierre"  id="fecha_cierre" placeholder="Ingrese la Fecha cierre" value="{{old('fecha_cierre')}}">

                                @error('fecha_cierre')
                                <div class ="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div><br>

                        <div class="card-title"><center><b>CONTACTO ID:</b>
                                <input type="text" class="form-control @error('contacto_id') is-invalid @enderror"
                                       name="contacto_id"  id="contacto_id" placeholder="Ingrese el contacto id" value="{{old('contacto_id')}}">

                                @error('contacto_id')
                                <div class ="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <br>

                        <div><center>
                                <input type="submit" class="btn btn-primary" value="Crear">
                                <a href="{{ route('evento.index') }}" class="btn btn-success">Volver</a>
                            </center></div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection()
