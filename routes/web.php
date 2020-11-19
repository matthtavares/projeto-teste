<?php

use Illuminate\Support\Facades\Route;

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
    return redirect(url('/usuarios/'));
});


Route::group(['prefix' => 'usuarios'], function () {
    Route::get('/', 'UsuariosController@index');
    Route::get('/cadastrar', 'UsuariosController@cadastrar');
    Route::get('/list', 'UsuariosController@list');
    Route::post('/save/{id?}', 'UsuariosController@save');
    Route::get('/{id}', 'UsuariosController@editar');
    Route::delete('/{id}', 'UsuariosController@delete');
});