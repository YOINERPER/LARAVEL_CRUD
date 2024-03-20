@extends('layouts.plantilla')


@section('user_name', session('name'))

@section('usu_rol', session('rol_name'))


@section('main')

    <div class="w-4/5 h-full py-10 px-20 flex flex-col ">
        <a href="{{url('users/create')}}" class="bg-[#0089A6] text-white mx-1 py-1 px-2 rounded-md w-24 text-center mb-2">Add New</a>
        <table class="table-auto w-full h-full">
            <thead class=" text-md text-gray-700 uppercase bg-gray-50 dark:bg-[#24252A] dark:text-white">
                <tr class=" border-y border-[#bbb8b8c4] shadow-sm">
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                    <tr class="border-y border-[#bbb8b8c4] shadow-sm">
                        <td class=" font-bold h-10">{{ $user->name }}</td>
                        <td class=" h-10">{{ $user->last_name }}</td>
                        <td class=" w-1/4 h-10 ">{{ $user->email }}</td>
                        <td class="  h-10">{{ $user->rol_name }}</td>
                        <td class="flex items-center justify-center pt-2 h-10">
                            <a href="{{url('/users/edit/'.$user->user_uid)}}" class="bg-[#0089A6] text-white mx-1 py-1 px-2 rounded-md"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form onsubmit="return false">
                                @csrf
                                <button onclick="deleteProd({{$user->user_uid}},this, 'users')" class="bg-red-500 text-white py-1 mx-1 px-2 rounded-md" type="submit"><i
                                    class="fa-solid fa-trash"></i></button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex flex-row mt-2">
            {{ $usuarios->onEachSide(5)->links('pagination::bootstrap-5') }}
        </div>

    </div>


@endsection
