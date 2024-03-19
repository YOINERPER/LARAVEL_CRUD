@extends('layouts.plantilla')

@section('user_name', session('name'))

@section('usu_rol', session('rol_name'))


@section('main')

    <div class="w-full h-full">
        <h1 class="h1 text-center">Edit Products</h1>
        <form class="flex flex-col justify-center items-center"  onsubmit="return false">
            @csrf
            <input type="hidden" value="{{$producto->prod_uid}}" id="prod_uid">
            <div class="w-4/5 grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 ">Code:</label>
                    <input name="prod_codigo" type="text" value="{{$producto->prod_codigo}}" id="prod_codigo"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 ">Name:</label>
                    <input value="{{$producto->prod_nombre}}" name="prod_nombre" type="text" id="prod_nombre"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 ">Price:</label>
                    <input value="{{$producto->prod_precio}}" name="prod_precio" type="number" id="prod_precio"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 ">Description:</label>
                    <input value="{{$producto->prod_descripcion}}" name="prod_descripcion" type="text" id="prod_descripcion"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
                <div>
                    <select name="prod_categoria" class="rounded-lg block w-full p-2.5" id="prod_categoria" required>
                        @foreach ($categorias as $cat)
                            <option value="{{$cat->id}}">{{$cat->cat_nombre}}</option>
                        @endforeach

                    </select>
                </div>



            </div>

            <button onclick="UpdateProd()"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit</button>
        </form>
    </div>


@endsection
