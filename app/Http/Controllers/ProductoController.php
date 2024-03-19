<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::join('categorias', 'productos.prod_categoria', '=', 'categorias.id')->orderBy('prod_nombre', 'asc')->paginate(5);

        return view('productos.principal', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.frmCreate', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        $datos["prod_uid"] = uniqid();

        $campos = [
            'prod_codigo' => 'required|string|max:20',
            'prod_nombre' => 'required|string|max:20',
            'prod_precio' => 'required|string',
            'prod_descripcion' => 'required|string|max:100',
            'prod_categoria' => 'required|string',
        ];

        $mensaje = [
            'required' => ":attribute Campo obligatorio",
            'prod_precio.required' => 'Precio debe ser numerico'
        ];

        $validateData = $request->validate($campos, $mensaje);


        //verificamos que no exista el producto con el mismo codigo
        $prodExist = Producto::where('prod_codigo', $datos['prod_codigo'])->first();

        if ($prodExist) {
            echo json_encode(array("icon" => "warning", "title" => "El codigo del producto ya se encuentra registrado"));
        } else {

            Producto::create($datos);

            echo json_encode(array("icon" => "success", "title" => "Producto creado con exito"));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::where('prod_uid', $id)->first();
        $categorias = Categoria::all();
        return view('productos.frmEdit', compact('categorias', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pro_uid)
    {

        $datos = request()->except('_token');

        $campos = [
            'prod_codigo' => 'required|string|max:20',
            'prod_nombre' => 'required|string|max:20',
            'prod_precio' => 'required|string',
            'prod_descripcion' => 'required|string|max:100',
            'prod_categoria' => 'required|string',
        ];

        $mensaje = [
            'required' => ":attribute Campo obligatorio",
            'prod_precio.required' => 'Precio debe ser numerico'
        ];

        $validateData = $request->validate($campos, $mensaje);


        //verificamos que exista el producto con el mismo codigo
        $prodExist = Producto::where('prod_uid', $pro_uid)->first();

        if ($prodExist == null) {
            echo json_encode(array("icon" => "warning", "title" => "El producto no existe"));
        } else {

            $updated = Producto::where('prod_uid', $pro_uid)->update($datos);

            echo json_encode(array("icon" => "success", "title" => "Producto actualizado con exito"));
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
            Producto::where("prod_uid", $id)->delete();;
            echo json_encode(array("icon" => "success", "title" => "Producto eliminado"));
        }
    }
}
