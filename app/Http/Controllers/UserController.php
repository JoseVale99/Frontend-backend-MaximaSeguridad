<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.edit')->only('edit');
        $this->middleware('can:user.update')->only('update');
    }

    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('type');
        if ($tipo == 'NOMBRE') {
            $tipo = "name";
        } elseif ($tipo == "NOMBRE DE USUARIO") {
            $tipo = "username";
        } else {
            $tipo = "email";
        }

        $variablesurl = $request->all();
        $users = User::buscar($tipo, $buscar)->paginate(5)->appends($variablesurl);
        return view('usuarios.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('usuarios.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        Session::flash('message_save', '¡Rol guardado con éxito!');
        return redirect()->route("user.edit", $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    // {
    // $user->delete();
    // Session::flash('message_delete', '¡Usuario borrado con éxito!');
    // return redirect()->route("user.index");
    // }
    public function profile()
    {

        $user = User::findOrFail(auth()->user()->id);

        return view('profile.index', compact('user'));
    }

    public function show()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('profile.profile_show',  compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {


        $request->validate(
            [
                'name' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'username' => 'required|regex:/[\pL\s\-."+0-9]+$/u', // regex Solo: incluye algunos carcateres
                'email' => 'required' //unique:users

            ]
        );

        Session::flash('message_save', '¡Sus datos se actualizaron con éxtio!');
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if ($request->check == 'on') {

            $request->validate(
                [
                    'photo' => 'required|image|max:2048'
                ]
            );

      
            $name_photo= $request->id;
      
            $uploadedFileUrl = $request->file('photo')->storeOnCloudinaryAs('perfil',$name_photo);

             $user-> photo =$uploadedFileUrl->getPath();
        }
        $user->saveOrFail();
        return redirect()->route("user.profile");
    }
}
