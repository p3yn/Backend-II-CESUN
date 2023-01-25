<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Bienvenido, Actividad 1.2 CESUN Backend II';
});

Route::get('/Book', 'App\Http\Controllers\BookController@index'); // mostrar todos los registros
Route::get('/Book/{id}', 'App\Http\Controllers\BookController@show'); // mostrar un registro
Route::post('/Book', 'App\Http\Controllers\BookController@store'); // crear un registro
Route::put('/Book/{id}', 'App\Http\Controllers\BookController@update'); // actualizar un registro
Route::delete('/Books/{id}', 'App\Http\Controllers\BookController@destroy'); // elimiar un registro

Route::get('/Author','App\Http\Controllers\AuthorController@index'); // mostrar todos los autores
Route::post('/Author','App\Http\Controllers\AuthorController@store'); // crear un registro
Route::post('/Author/{id}','App\Http\Controllers\AuthorController@show'); // mostrar un registro por Id