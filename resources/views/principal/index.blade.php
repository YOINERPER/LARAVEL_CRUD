@extends('layouts.plantilla')

@section('user_name',session('name'))

@section('usu_rol', session('rol_name'))

@section('main')

    <div class="w-60 h-2/3 bg-[#42BCE5] rounded-lg">
        <h4 class="text-lg font-semibold text-gray-900 dark:text-slate-900 text-center ">PRODUCT ADMIN</h4>
        <div class="w-full h-4/5 bg-slate-600 ">
            <a href="{{url('products')}}">
                <img class="h-full w-full hover:opacity-90" src="{{ asset('/imagenes/img-log-prod-list.png') }}"
                    alt="imgprod.png">
            </a>
        </div>
        <div
            class="pb-2 w-full h-1/5 bg-slate-900 rounded-b-lg text-white font-sans flex flex-col justify-center items-center">
            <a href="{{url('products')}}"
                class="w-1/2 h-10 bg-[#0089A6] hover:opacity-90 rounded-full p-2 hover:text-[#24252A] text-center">Go</a>
        </div>
    </div>

@endsection
