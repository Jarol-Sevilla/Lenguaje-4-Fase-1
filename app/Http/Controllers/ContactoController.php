<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Class ContactoController extends Controller
{

    public function index(Request $request)
    {
        $ContactoBuscar=$request->get('buscar');
        $contactos=DB::table('contactos')
            ->select('id','nombre', 'apellido', 'correo_electronico', 'telefono')
            ->where('nombre', 'LIKE', '%'.$ContactoBuscar.'%')
            ->orwhere('apellido', 'LIKE', '%'.$ContactoBuscar.'%')
            ->orwhere('correo_electronico', 'LIKE', '%'.$ContactoBuscar.'%')
            ->orwhere('telefono', 'LIKE', '%'.$ContactoBuscar.'%')
            ->paginate(10);
        return view ('Contacto.Cindex', compact('contactos','ContactoBuscar'));

        $contactos =Contacto::paginate(20);
        return view('Contacto.Cindex', compact('contactos'));

    }

    public function create()
    {
        return view('Contacto.CrearC');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'apellido'=>'required|regex:/[A-Z][a-z]+/i',
            'correo_electronico'=>'required|unique:usuarios|Email',
            'teléfono'=>'required|numeric|digits:8',
        ]);

        $contacto = new Contacto();
        $contacto->nombre=$request->input('nombre');
        $contacto->apellido=$request->input('apellido');
        $contacto->correo_electronico=$request->input('correo_electronico');
        $contacto->telefono=$request->input('telefono');

        if ($contacto->save()){
            $mensaje = "El contacto se creo exitosamente";
        }

        else{
            $mensaje = "El contacto no se creo exitosamente";
        }

        return redirect()->route('contacto.index')->with('mensaje',$mensaje);
    }

    public function show(string $id)
    {
        $contacto = Contacto::findOrfail($id);
        return view('Contacto.Cshow' , compact('contacto'));
    }

    public function edit(string $id)
    {
        $contacto = Contacto::findOrfail($id);
        return view('Contacto.Ceditar')->with('contactos',$contacto);
    }

    public function update(Request $request, string $id)
    {
        $contacto = Contacto::findOrfail($id);

        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'apellido'=>'required|regex:/[A-Z][a-z]+/i',
            'correo_electronico'=>'required|unique:usuarios|Email',
            'teléfono'=>'required|numeric|digits:8',
        ]);

        $contacto->nombre=$request->input('nombre');
        $contacto->apellido=$request->input('apellido');
        $contacto->correo_electronico=$request->input('correo_electronico');
        $contacto->telefono=$request->input('telefono');

        if ($contacto->save()){
            $mensaje = "El contacto se edito exitosamente";
        }

        else{
            $mensaje = "El contacto no se edito exitosamente";
        }

        return redirect()->route('contacto.index')->with('mensaje',$mensaje);

    }

    public function destroy(string $id)
    {
        $borrados = Contacto::destroy($id);

        if ($borrados > 0){
            $mensaje = "El contacto se elimino exitosamente";
        }

        else{
            $mensaje = "El contacto no se elimino exitosamente";
        }

        return redirect()->route('contacto.index')->with('mensaje',$mensaje);
    }
}
