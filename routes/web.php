<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Principal;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[Login::class, 'frmLogin']);
Route::post('/login',[Login::class, 'login']);
Route::get('/products',[ProductoController::class, 'index']);

