<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $EventoBuscar=$request->get('buscar');
        $eventos=DB::table('eventos')
            ->select('id','titulo', 'descripcion', 'fecha_inicio', 'fecha_cierre', 'contacto_id')
            ->where('titulo', 'LIKE', '%'.$EventoBuscar.'%')
            ->orwhere('descripcion', 'LIKE', '%'.$EventoBuscar.'%')
            ->orwhere('fecha_inicio', 'LIKE', '%'.$EventoBuscar.'%')
            ->orwhere('fecha_cierre', 'LIKE', '%'.$EventoBuscar.'%')
            ->orwhere('contacto_id', 'LIKE', '%'.$EventoBuscar.'%')
            ->paginate(10);
        return view ('Evento.Eindex', compact('eventos','EventoBuscar'));

        $eventos =Evento::paginate(20);
        return view('Evento.Eindex', compact('eventos'));

    }

    public function create()
    {
        return view('Evento.Ecrear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required|regex:/[A-Z][a-z]+/i',
            'descripcion'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha_inicio'=>'required|regex:/[0-9]/',
            'fecha_cierre'=>'required|regex:/[0-9]/',
            'contacto_id'=>'required|numeric|min:1|max:500',

        ]);

        $evento = new Evento();
        $evento->titulo=$request->input('titulo');
        $evento->descripcion=$request->input('descripcion');
        $evento->fecha_inicio=$request->input('fecha_inicio');
        $evento->fecha_cierre=$request->input('fecha_cierre');
        $evento->contacto_id=$request->input('contacto_id');


        if ($evento->save()){
            $mensaje = "El evento se creo exitosamente";
        }

        else{
            $mensaje = "El evento no se creo exitosamente";
        }

        return redirect()->route('evento.index')->with('mensaje',$mensaje);
    }

    public function show(string $id)
    {
        $evento = Evento::findOrfail($id);
        return view('Evento.Eshow' , compact('evento'));
    }

    public function edit(string $id)
    {
        $evento = Evento::findOrfail($id);
        return view('Evento.Eeditar')->with('eventos',$evento);
    }

    public function update(Request $request, string $id)
    {
        $evento = Evento::findOrfail($id);

        $request->validate([
            'titulo'=>'required|regex:/[A-Z][a-z]+/i',
            'descripcion'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha_inicio'=>'required|date_format:Y-m-d',
            'fecha_cierre'=>'required|date_format:Y-m-d',
            'contacto_id'=>'required|numeric|min:1|max:500',

        ]);

        $evento->titulo=$request->input('titulo');
        $evento->descripcion=$request->input('descripcion');
        $evento->fecha_inicio=$request->input('fecha_inicio');
        $evento->fecha_cierre=$request->input('fecha_cierre');
        $evento->contacto_id=$request->input('contacto_id');

        if ($evento->save()){
            $mensaje = "El evento se edito exitosamente";
        }

        else{
            $mensaje = "El evento no se edito exitosamente";
        }

        return redirect()->route('evento.index')->with('mensaje',$mensaje);

    }

    public function destroy(string $id)
    {
        $borrados = Evento::destroy($id);

        if ($borrados > 0){
            $mensaje = "El evento se elimino exitosamente";
        }

        else{
            $mensaje = "El evento no se elimino exitosamente";
        }

        return redirect()->route('evento.index')->with('mensaje',$mensaje);
    }
}
