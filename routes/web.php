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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/generar', 'HomeController@generate')->name('generar');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function()
{
    Route::get('/usuarios', 'UserController@index');
    Route::get('/gerencias', 'GerenciaController@index');
    Route::get('/departamentos', 'DepartamentoController@index');
});