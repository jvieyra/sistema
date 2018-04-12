<?php

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
    return view('contenido/contenido');
});

//obtener datos verbo get
Route::get('/categoria','CategoriaController@index');

//store CategoriaController
Route::post('/categoria/registrar','CategoriaController@store');

//Update verbo put
Route::put('/categoria/actualizar','CategoriaController@update');

//status
Route::put('/categoria/desactivar','CategoriaController@desactivar');
Route::put('/categoria/activar','CategoriaController@activar');
