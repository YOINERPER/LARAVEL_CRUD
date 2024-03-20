<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Usuario;
use Illuminate\Http\Request;

class Login
{
    //
    public function frmLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $mensaje = "";
        $datos = request()->except('_token');

        if (trim($datos['email']) == "" || trim($datos['password']) == "") {

            $mensaje = 3;
            return view('login', compact('mensaje'));
        } else {
            //we encrypt the password
            $datos['password'] = sha1($datos['password']);

            $email = $datos['email'];
            $password = $datos['password'];
            $usuario = Usuario::where('email', $email)->Where('password', $password)->join('roles', 'usuarios.role_id', '=', 'roles.id')->first();
            if ($usuario) {
                session(['name' => $usuario['name'], 'user_uid' => $usuario['user_uid'], 'rol_name' => $usuario['rol_name'], 'user_fot'=>$usuario['user_fot']]); //guardamos los datos del usuario
                if ($usuario) {
                    $user_uid = $usuario['user_uid'];
                    $imagenPerfil = $usuario['user_fot'];
                    return view('principal.index', compact('user_uid','imagenPerfil'));
                } else {
                    $mensaje = 2;
                    return view('login', compact('mensaje'));
                }
            } else {
                $mensaje = 2;
                return view('login', compact('mensaje'));
            }
        }
    }

    public function principal (){
        if(session('user_uid')){
            $user_uid = session('user_uid');
            $imagenPerfil = session('user_fot');
            return view('principal.index', compact('user_uid', 'imagenPerfil'));
        }else{
            return view('/');
        }

    }
}
