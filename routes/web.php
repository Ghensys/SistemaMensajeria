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

//Nueva Comunicacion METHODO GET
Route::get('/nuevo_mensaje', 'HomeController@getNewCommunication')->name('nuevo_mensaje');

//Nueva Comunicacion METHODO POST
Route::post('/nuevo_mensaje', 'HomeController@postNewCommunication')->name('nuevo_mensaje');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::get('/usuarios', 'UserController@index');
    Route::get('/gerencias', 'GerenciaController@index');
    Route::get('/departamentos', 'DepartamentoController@index');
});

Route::resource('communication_receiver', 'CommunicationReceiverController@store');

Route::get('GetManagements', 'ServiceController@GetManagements');
Route::get('GetDeparments/{id}', 'ServiceController@GetDeparments');