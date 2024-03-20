<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = usuario::where('role_id', 3)->join('roles', 'usuarios.role_id', '=', 'roles.id')->orderBy('name', 'asc')->paginate(5);

        return view('usuarios.principal', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.frmCreate', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $datos = request()->except('_token');
        $datos["user_uid"] = uniqid();
        $datos['password'] = sha1($datos['password']);


        $campos = [
            'name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|Email',
            'password' => 'required|string|max:100',
            'role_id' => 'required|integer',
        ];

        $mensaje = [
            'required' => ":attribute Campo obligatorio",
            'role_id.required' => 'El rol debe ser numerico'
        ];

        $validateData = $request->validate($campos, $mensaje);


        //verificamos que no exista el usuario con el mismo codigo
        $prodExist = usuario::where('email', $datos['email'])->first();

        if ($prodExist) {
            echo json_encode(array("icon" => "warning", "title" => "Email is already registered"));
        } else {

            usuario::insert($datos);

            echo json_encode(array("icon" => "success", "title" => "Success created"));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = usuario::where('user_uid', $id)->first();
        $roles = Role::all();
        return view('usuarios.frmEdit', compact('roles', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$user_uid)
    {
        $datos = request()->except('_token');

        $campos = [
            'name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|Email',
            'password' => 'required|string|max:100',
            'role_id' => 'required|integer',
        ];

        $mensaje = [
            'required' => ":attribute Campo obligatorio",
            'role_id.required' => 'El rol debe ser numerico'
        ];



        $validateData = $request->validate($campos, $mensaje);


        //verificamos que exista el usuario con el mismo codigo
        $userexist = usuario::where('user_uid', $user_uid)->first();

        if ($userexist == null) {
            echo json_encode(array("icon" => "warning", "title" => "El usuario no existe"));
        } else {

            $updated = usuario::where('user_uid', $user_uid)->update($datos);

            echo json_encode(array("icon" => "success", "title" => "usuario actualizado con exito"));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (trim($id) == '') {
            echo json_encode(array("icon" => "alert", "title" => "Datos incompletos"));
        } else {
            usuario::where("user_uid", $id)->delete();
            echo json_encode(array("icon" => "success", "title" => "Producto eliminado"));
        }
        //
    }

    public function imgUpdate(Request $request){
        $datos = request()->except('_token');
        $user_uid = $datos['user_uid'];
        $imagen = $datos['image'];
        $imageName = time().'.'.$imagen->getClientOriginalExtension();
        $imagen->storeAs('public/', $imageName);

        usuario::where('user_uid', $datos['user_uid'])->update(["user_fot" => $imageName]);

        $imagenPerfil = $imageName;
        return view('principal.index', compact('user_uid', 'imagenPerfil'));
    }
}
