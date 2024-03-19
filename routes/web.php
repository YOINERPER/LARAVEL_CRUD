<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Principal;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::get('/login',[Login::class, 'frmLogin']);
Route::post('/login',[Login::class, 'login']);

//productos
Route::get('/products',[ProductoController::class, 'index']);
Route::delete('/products/{id}',[ProductoController::class, 'destroy']);
Route::get('/products/create',[ProductoController::class, 'create']);
Route::post('/products/create',[ProductoController::class, 'store']);
Route::get('/products/edit/{id}',[ProductoController::class, 'edit']);
Route::put('/products/edit/{id}',[ProductoController::class, 'update']);



