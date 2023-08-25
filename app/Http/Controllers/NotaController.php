<?php

namespace App\Http\Controllers;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    public function index(Request $request)
    {
        $NotaBuscar=$request->get('buscar');
        $notas=DB::table('notas')
            ->select('id','texto', 'fecha', 'contacto_id')
            ->where('texto', 'LIKE', '%'.$NotaBuscar.'%')
            ->orwhere('fecha', 'LIKE', '%'.$NotaBuscar.'%')
            ->orwhere('contacto_id', 'LIKE', '%'.$NotaBuscar.'%')
            ->paginate(10);
        return view ('Nota.Nindex', compact('notas','NotaBuscar'));

        $notas =Nota::paginate(20);
        return view('Nota.Nindex', compact('notas'));

    }

    public function create()
    {
        return view('Nota.Ncrear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha'=>'required|regex:/[0-9]/',
            'contacto_id'=>'required|numeric|min:1|max:500',
        ]);

        $nota = new Contacto();
        $nota->texto=$request->input('texto');
        $nota->fecha=$request->input('fecha');
        $nota->contacto_id=$request->input('contacto_id');

        if ($nota->save()){
            $mensaje = "La nota se creo exitosamente";
        }

        else{
            $mensaje = "La nota no se creo exitosamente";
        }

        return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }

    public function show(string $id)
    {
        $nota = Nota::findOrfail($id);
        return view('Nota.Cshow' , compact('nota'));
    }

    public function edit(string $id)
    {
        $nota = Nota::findOrfail($id);
        return view('Nota.Neditar')->with('notas',$nota);
    }

    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrfail($id);

        $request->validate([
            'texto'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha'=>'required|regex:/[0-9]/',
            'contacto_id'=>'required|numeric|min:1|max:500',
        ]);

        $nota->texto=$request->input('texto');
        $nota->fecha=$request->input('fecha');
        $nota->contacto_id=$request->input('contacto_id');

        if ($nota->save()){
            $mensaje = "La nota se edito exitosamente";
        }

        else{
            $mensaje = "La nota no se edito exitosamente";
        }

        return redirect()->route('nota.index')->with('mensaje',$mensaje);

    }

    public function destroy(string $id)
    {
        $borrados = Nota::destroy($id);

        if ($borrados > 0){
            $mensaje = "La nota se elimino exitosamente";
        }

        else{
            $mensaje = "La nota no se elimino exitosamente";
        }

        return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }
}
