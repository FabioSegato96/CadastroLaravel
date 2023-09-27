<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', 'App\Http\Controllers\ControladorCategoria@indexJson');
Route::get('/produtos', 'App\Http\Controllers\ControladorProduto@indexJson');
Route::get('/produtos/{id}', 'App\Http\Controllers\ControladorProduto@show');
Route::put('/produtos/{id}', 'App\Http\Controllers\ControladorProduto@update');
Route::post('/produtos', 'App\Http\Controllers\ControladorProduto@store');
Route::delete('/produtos/{id}', 'App\Http\Controllers\ControladorProduto@destroy');
