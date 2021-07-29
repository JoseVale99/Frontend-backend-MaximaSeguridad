<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:permission.index')->only('index');
        $this->middleware('can:permission.edit')->only('edit');
       // $this->middleware('can:permission.update')->only('update');
        $this->middleware('can:permission.destroy')->only('destroy');
    }
    public function index(Request $request)
    {
       

        $buscar = $request->get('buscarpor');
        $tipo = $request->get('type');
        if($tipo == 'NOMBRE'){
            $tipo = 'name';
        }else{
            $tipo = 'created_at';
            
        }

        $variablesurl = $request->all();
        // $permissions = Permission::buscar($tipo, $buscar)->paginate(5)->appends($variablesurl);
        $permissions = Permission::paginate(5)->appends($variablesurl);

        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('permissions.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request, Permission $permission)
    // {

    //     $request->validate(
    //         [
    //             'nombre' => 'required|unique:permissions|regex:/^[\pL\s\-]+$/u', // regex solo letras
    //         ]
    //     );
        
    //     $permission = new Permission($request->all());
    //     $permission->nombre = Str::upper($request->input('nombre'));
    //     $permission->saveOrFail();

    //     Session::flash('message_save', '¡Permiso guardado con éxito!');
        
    //     return redirect()->route('permission.index');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        return view('permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
       return view('permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function update(Request $request, Permission $permission)
    {
        $request->validate(
            [
                'name' => 'required|regex:/^[\pL\s\-.]+$/u', // regex solo letras
            ]
        );
        $permission->fill($request->all());
        $permission->saveOrFail();

      
      Session::flash('message_save', '¡Permiso actualizado con éxito!');

      return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        
        $permission->delete();
        Session::flash('message_delete', '¡Permiso borrado con éxito!');
        return redirect()->route("permission.index");
    }
}
