<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('can:role.index');
    }

    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('type');
        if($tipo == 'FECHA'){
            $tipo = 'created_at';
        }else{
            $tipo = 'name';
        }

        $variablesurl = $request->all();
        // $roles = Role::buscar($tipo, $buscar)->paginate(5)->appends($variablesurl);
        $roles = Role::paginate(5)->appends($variablesurl);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request, Role $role)
    {

        $request->validate(
            [
                'name' => 'required|unique:roles|regex:/^[\pL\s\-0-9]+$/u', // regex solo letras
            ]
        );
        $role->fill($request->all());
        $role->saveOrFail();
        $role->permissions()->sync($request->permissions);
        Session::flash('message_save', '¡Rol creado con éxito!');
        
        return redirect()->route('role.edit',$role);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
       return view('roles.edit',compact('role','permissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        
       
        $request->validate(
            [
                'name' => 'required|regex:/^[\pL\s\-0-9]+$/u', // regex solo letras
            ]
        );
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
      Session::flash('message_save', '¡Rol actualizado con éxito!');

      return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        
        $role->delete();
        Session::flash('message_delete', '¡Rol borrado con éxito!');
        return redirect()->route("role.index");
    }
}
