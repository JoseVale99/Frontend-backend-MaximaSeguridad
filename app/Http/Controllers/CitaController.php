<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;

class CitaController extends Controller
{
   
  

    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $tipo = $request->get('tipos');
        $variablesurl = $request->all();
        $citas = Cita::buscar($tipo, $buscar)->paginate(5)->appends($variablesurl);
        return view('Cita.index', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'telefono' => 'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/u',
                'direccion' => 'required|regex:/[\pL\s\-"+0-9]+.$/u',
                'referencias' => 'required|regex:/[\pL\s\-"0-9]+.$/u',
                'entidad' => 'required',
                'tipo_atencion' => 'required',
                'fecha' => 'required|date|unique:citas',
                'descripcion' => 'required|regex:/[\pL\s\-"+0-9]+.$/u', // regex Solo: incluye algunos carcateres
            ]
        );
       
           
       
      $citas = new Cita($request->all());
      
          $citas->id_cliente = auth()->user()->id;  
      
        $citas->nombre = Str::upper($request->input('nombre'));
        $citas->descripcion = Str::upper($request->input('descripcion'));
        $citas->direccion = Str::upper($request->input('direccion'));
        $citas->referencias = Str::upper($request->input('referencias'));
        $citas->entidad = Str::upper($request->input('entidad'));
        $citas->tipo_atencion = Str::upper($request->input('tipo_atencion'));


        $citas->saveOrFail();
        Session::flash('message_save', '¡Cita guardada con éxito!');
        return redirect()->route("cita.create");
     
    }

    public function create()
    {
        return view('Cita.agendar');

    }

    public function destroy($id)
    {
        $citas = Cita::findOrFail($id);
        if ($citas){

        $citas->delete($citas);
        Session::flash('message_delete', '¡Cita borrada con éxito!');   
    }
        return redirect()->route("cita.index");
    }

}
