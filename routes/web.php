<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Principal;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;


Route::get('/login',[Login::class, 'frmLogin']);
Route::post('/login',[Login::class, 'login']);
Route::get('/principal',[Login::class, 'principal']);

//productos
Route::get('/products',[ProductoController::class, 'index']);
Route::delete('/products/{id}',[ProductoController::class, 'destroy']);
Route::get('/products/create',[ProductoController::class, 'create']);
Route::post('/products/create',[ProductoController::class, 'store']);
Route::get('/products/edit/{id}',[ProductoController::class, 'edit']);
Route::put('/products/edit/{id}',[ProductoController::class, 'update']);

//clientes

Route::get('/users',[UsuarioController::class, 'index']);
Route::delete('/users/{id}',[UsuarioController::class, 'destroy']);
Route::get('/users/create',[UsuarioController::class, 'create']);
Route::post('/users/create',[UsuarioController::class, 'store']);
Route::get('/users/edit/{id}',[UsuarioController::class, 'edit']);
Route::put('/users/edit/{id}',[UsuarioController::class, 'update']);




