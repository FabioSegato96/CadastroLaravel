<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\ControladorProduto;
//use App\Http\Controllers\ControladorCategoria;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/produtos', 'App\Http\Controllers\ControladorProduto@indexView')->name('produtos');
Route::get('/produtos/novo', 'App\Http\Controllers\ControladorProduto@create')->name('novo_produto');
Route::post('/produtos', 'App\Http\Controllers\ControladorProduto@store')->name('inserir_produto');
Route::get('/produtos/editar/{id}', 'App\Http\Controllers\ControladorProduto@edit')->name('editar_produto');
Route::get('/produtos/apagar/{id}', 'App\Http\Controllers\ControladorProduto@destroy')->name('apagar_produto');
Route::post('/produtos/edicao/{id}', 'App\Http\Controllers\ControladorProduto@update')->name('edicao_produto');

Route::get('/departamentos', 'App\Http\Controllers\ControladorCategoria@index')->name('departamentos');
Route::get('/departamentos/novo', 'App\Http\Controllers\ControladorCategoria@create')->name('novo_departamento');
Route::post('/departamentos', 'App\Http\Controllers\ControladorCategoria@store')->name('inserir_departamento');
Route::get('/departamentos/editar/{id}', 'App\Http\Controllers\ControladorCategoria@edit')->name('editar_departamento');
Route::get('/departamentos/apagar/{id}', 'App\Http\Controllers\ControladorCategoria@destroy')->name('apagar_departamento');
Route::post('/departamentos/edicao/{id}', 'App\Http\Controllers\ControladorCategoria@update')->name('edicao_departamento');
