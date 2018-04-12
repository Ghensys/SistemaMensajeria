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

//Acceso al sistema
Route::get('/home', 'HomeController@index')->name('home');

//Bandeja de Entrada
Route::get('/bandeja_entrada', 'CommunicationReceiverController@show')->name('bandeja_entrada');

//Mensajes Enviados
Route::get('/enviado', 'CommunicationSendController@show')->name('enviados');

//Nueva Comunicacion (Nuevo mensaje) METHODO GET para el acceso al formulario
Route::get('/nuevo_mensaje', 'HomeController@getNewCommunication')->name('nuevo_mensaje');

//Nueva Comunicacion (Nuevo mensaje) METHODO POST Registro de la primera parte del formulario
Route::post('/nuevo_mensaje', 'HomeController@postNewCommunication')->name('nuevo_mensaje');


Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function()
{
    Route::get('/usuarios', 'UserController@index');
    Route::get('/gerencias', 'GerenciaController@index');
    Route::get('/departamentos', 'DepartamentoController@index');
});

//Ruta para el Registro del Destinatario de la Comunicacion
Route::post('communication_receiver', 'CommunicationReceiverController@store');

//Ruta del Dropdown dependiente de Gerencia para Departamentos (Select)
Route::get('dropdown/{id}','ServiceController@getDepartments');

//Ruta del Dropdown dependiente de Departamento para Usuarios (Select)
Route::get('dropdown2/{id}','ServiceController@getUsers');

//Ruta para ver el Mensaje recibido
Route::get('/mensaje/{id}', 'MessageController@getMessage')->name('ver_mensaje');

//Route::get('downloadFile/{}')