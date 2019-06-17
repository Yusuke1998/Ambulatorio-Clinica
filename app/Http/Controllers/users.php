<?php
// USUARIOS
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\receptionist;
use App\doctor;

class users extends Controller
{
    public function __construct()
    {
        $this->middleware('administrador');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('sistema/usuario/index')->with('usuarios',$usuarios);
    }

    public function create()
    {
        return view('sistema/usuario/create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->rol = $request->rol;
        $user->password = bcrypt($request->password);
        
        $user->save();

        return back()->with('info','Usuario creado con exito!');
    }

    public function edit($id)
    {
        $editaru = User::find($id);
        return view('sistema/usuario/edit')
        ->with('editaru',$editaru);

    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->rol = $request->rol;
        $usuario->update();

        return back()->with('info','Usuario actualizado con exito!');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);

        if ($usuario->doctor) {

            $medico = doctor::where('user_id',$usuario->id);
            $medico->delete();

        }elseif ($usuario->receptionist) {

            $recepcionista = receptionist::where('user_id',$usuario->id);
            $recepcionista->delete();

        }else{
            $usuario->delete();
        }

        return back()->with('info','Usuario eliminado con exito!');
    }

    public function delete($id)
    {
        $usuario = User::find($id);

        if ($usuario->doctor) {

            $medico = doctor::where('user_id',$usuario->id);
            $medico->delete();

        }elseif ($usuario->receptionist) {

            $recepcionista = receptionist::where('user_id',$usuario->id);
            $recepcionista->delete();

        }else{
            $usuario->delete();
        }

        return back()->with('info','Usuario eliminado con exito!');
    }
}
