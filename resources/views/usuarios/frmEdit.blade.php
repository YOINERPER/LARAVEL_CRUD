@extends('layouts.plantilla')

@section('user_name', session('name'))

@section('usu_rol', session('rol_name'))


@section('main')

    <div class="w-full h-full">
        <h1 class="h1 text-center">Edit Clients</h1>
        <form class="flex flex-col justify-center items-center"  onsubmit="return false">
            @csrf
            <input type="hidden" value="{{$usuario->user_uid}}" id="user_uid">
            <div class="w-4/5 grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-xl font-medium text-gray-900 ">Name:</label>
                    <input name="name" type="text" value="{{$usuario->name}}" id="name"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-xl font-medium text-gray-900 ">last_name:</label>
                    <input value="{{$usuario->last_name}}" name="last_name" type="text" id="last_name"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
                <div>
                    <label for="email" class="block mb-2 text-xl font-medium text-gray-900 ">Email:</label>
                    <input value="{{$usuario->email}}" name="prod_precio" type="email" id="email"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
                </div>
             
                    
                    <input type="hidden" value="{{$usuario->password}}" name="prod_descripcion" type="text" id="password"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required />
             
                <div>
                    <select name="role_id" class="rounded-lg block w-full mt-4 p-2.5" id="role_id" required>
                        @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->rol_name}}</option>
                        @endforeach
                    </select>
                </div>



            </div>

            <button onclick="updateUser()"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit</button>
        </form>
    </div>


@endsection
