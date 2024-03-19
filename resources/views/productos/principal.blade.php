@extends('layouts.plantilla')

@section('user_name', session('name'))

@section('usu_rol', session('rol_name'))


@section('main')

    <div class="w-auto h-full py-10 px-20 flex flex-col ">
        <a href="{{url('products/create')}}" class="bg-[#0089A6] text-white mx-1 py-1 px-2 rounded-md w-24 text-center mb-2">Add New</a>
        <table class="table-auto w-full h-full">
            <thead class=" text-md text-gray-700 uppercase bg-gray-50 dark:bg-[#24252A] dark:text-white">
                <tr class=" border-y border-[#bbb8b8c4] shadow-sm">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr class="border-y border-[#bbb8b8c4] shadow-sm">
                        <td class=" font-bold h-10">{{ $producto->prod_codigo }}</td>
                        <td class=" h-10">{{ $producto->prod_nombre }}</td>
                        <td class=" w-1/4 h-10 ">{{ $producto->prod_descripcion }}</td>
                        <td class="  h-10">{{ $producto->prod_precio }}</td>
                        <td class=" w-1/4 h-10">{{ $producto->cat_nombre }}</td>
                        <td class="flex items-center justify-center pt-2 h-10">
                            <a href="{{url('/products/edit/'.$producto->prod_uid)}}" class="bg-[#0089A6] text-white mx-1 py-1 px-2 rounded-md"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <form onsubmit="return false">
                                @csrf
                                <button onclick="deleteProd({{$producto->prod_uid}},this,'products')" class="bg-red-500 text-white py-1 mx-1 px-2 rounded-md" type="submit"><i
                                    class="fa-solid fa-trash"></i></button>
                            </form>
                            

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex flex-row mt-2">
            {{ $productos->onEachSide(5)->links('pagination::bootstrap-5') }}
        </div>

    </div>
    

@endsection
