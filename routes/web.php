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


Route::get('/', 'PersonasController@get_index');
Route::post('/usuarios/crear', 'PersonasController@post_crear');
Route::get('/usuarios/{id}/editar', 'PersonasController@editar');
Route::post('/usuarios/{id}/actualizar', 'PersonasController@actualizar');