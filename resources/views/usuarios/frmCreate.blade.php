@extends('layouts.plantilla')

@section('user_name', session('name'))

@section('usu_rol', session('rol_name'))


@section('main')

    <div class="w-full h-full">
        <h1 class="h1 text-center">Add Clients</h1>

        <form class="flex flex-col justify-center items-center"  onsubmit="return false">
            @csrf
            <div class="w-4/5 grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-xl font-medium text-gray-900 ">Name:</label>
                    <input name="name" type="text" id="name"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required value="{{old('name')}}" />
                        @error('name') {{$mensaje}} @enderror
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-xl font-medium text-gray-900 ">Last Name:</label>
                    <input name="last_name" type="text" id="last_name"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required value="{{old('last_name')}}"/>
                        @error('last_name') {{$mensaje}} @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-xl font-medium text-gray-900 ">Email:</label>
                    <input name="email" type="text" id="email"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required value="{{old('email')}}"/>
                        @error('email') {{$mensaje}} @enderror
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 ">Password:</label>
                    <input name="password" type="password" id="password"
                        class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 "
                        required value="{{old('password')}}"/>
                        @error('password') {{$mensaje}} @enderror
                </div>
                <div>
                    <select name="role_id" class="border rounded-lg block w-full p-2.5" id="role_id" value="{{old('role_id')}}" required>
                        @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->rol_name}}</option>
                        @endforeach

                    </select>
                    @error('role_id') {{$mensaje}} @enderror
                </div>



            </div>

            <button onclick="CreateUser()"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create</button>
        </form>
    </div>


@endsection
