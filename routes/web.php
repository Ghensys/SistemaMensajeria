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

//Ruta para ver el Mensaje recibido
Route::get('/mensaje/{id}', 'MessageController@getMessage')->name('ver_mensaje');


//Mensajes Enviados
Route::get('/enviado', 'CommunicationSendController@show')->name('enviados');

//Ruta para ver el Mensaje enviado
Route::get('/mi_mensaje/{id}', 'MessageController@getMessageSend');


//Ruta para Responder los Mensajes
Route::get('/responder_mensaje/{id}', 'MessageController@getReplyMessage')->name('responder_mensaje');

//Ruta para la registrar la Respuesta del Mensaje
Route::post('reply_message', 'MessageController@postReplyMessage');



//Nueva Comunicacion (Nuevo mensaje) METHODO GET para el acceso al formulario
Route::get('/nuevo_mensaje', 'HomeController@getNewCommunication')->name('nuevo_mensaje');

//Nueva Comunicacion (Nuevo mensaje) METHODO POST Registro de la primera parte del formulario
Route::post('/nuevo_mensaje', 'HomeController@postNewCommunication')->name('nuevo_mensaje');

/*
 *Grupo de rutas protegidas por el middleware de administrador
 */
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function()
{
	/*
     * --------------------------------------------------
     * Usuarios
     */
	//Ruta del index
    Route::get('/usuario', 'UserController@index')->name('usuario.index');
    
    //Ruta desde la cual llama la data.
    Route::get('/usuario/getUsers', 'UserController@getUsers')->name('usuario.getUsers');
    
    //Ruta donde trae la data del usuario
    Route::get('/usuario/update/{id}', 'UserController@getUpdate');
    
    //Ruta donde hace la actualizacion
    Route::post('/usuario/update', 'UserController@postUpdateUser');

    /*
     * --------------------------------------------------
     * Gerencias
     */
	//Ruta del index
    Route::get('/gerencia', 'ManagementController@index')->name('gerencia.index');
    
    //Ruta desde la cual llama la data.
    Route::get('/gerencia/getManagements', 'ManagementController@getManagements')->name('gerencia.getManagements');

    //Ruta para la vista con el formulario de registro de gerencia
    Route::get('/gerencia/new', 'ManagementController@getFormNewManagement')->name('gerencia.new');

    //Carga de la gerencia
    Route::post('/gerencia/new', 'ManagementController@create');
    
    //Ruta donde trae la data de la gerencia
    Route::get('/gerencia/update/{id}', 'ManagementController@getUpdate');
    
    //Ruta donde hace la actualizacion
    Route::post('/gerencia/update', 'ManagementController@postUpdateManagement');

    /*
     * --------------------------------------------------
     * Departamento
     */
	//Ruta del index
    Route::get('/departamento', 'DepartmentController@index')->name('departamento.index');
    
    //Ruta desde la cual llama la data.
    Route::get('/departamento/getDepartments', 'DepartmentController@getDepartments')->name('departamento.getDepartments');

    //Ruta para la vista con el formulario de registro de departamento
    Route::get('/departamento/new', 'DepartmentController@getFormNewDepartments')->name('departamento.new');

    //Carga de la departamento
    Route::post('/departamento/new', 'DepartmentController@create');
    
    //Ruta donde trae la data de la departamento
    Route::get('/departamento/update/{id}', 'DepartmentController@getUpdate');
    
    //Ruta donde hace la actualizacion
    Route::post('/departamento/update', 'DepartmentController@postUpdateDepartment');

    /*
     * --------------------------------------------------
     * Tipo de Mensaje
     */
    //Ruta del index
    Route::get('/tipo_mensaje', 'CommunicationTypeController@index')->name('tipo_mensaje.index');
    
    //Ruta desde la cual llama la data.
    Route::get('/tipo_mensaje/getCommunicationType', 'CommunicationTypeController@getCommunicationType')->name('tipo_mensaje.getCommunicationType');

    //Ruta para la vista con el formulario de registro del tipo de mensaje
    Route::get('/tipo_mensaje/new', 'CommunicationTypeController@getFormNewCommunicationTypes')->name('tipo_mensaje.new');

    //Carga de la tipo de mensaje
    Route::post('/tipo_mensaje/new', 'CommunicationTypeController@create');
    
    //Ruta donde trae la data del tipo de mensaje
    Route::get('/tipo_mensaje/update/{id}', 'CommunicationTypeController@getUpdate');
    
    //Ruta donde hace la actualizacion
    Route::post('/tipo_mensaje/update', 'CommunicationTypeController@postUpdateCommunicationType');
});

//Ruta para el Registro del Destinatario de la Comunicacion
Route::post('communication_receiver', 'CommunicationReceiverController@store');

//Ruta del Dropdown dependiente de Gerencia para Departamentos (Select) Registro de Usuarios
Route::get('dropdown/{id}', 'ServiceController@getDepartments');

//Ruta del Dropdown dependiente de Gerencia para Departamentos (Select) Actualizacion de Usuarios
Route::get('/update/dropdown/{id}', 'ServiceController@getDepartments');


//Ruta del Dropdown dependiente de Departamento para Usuarios (Select) Registro de Usuarios
Route::get('dropdown2/{id}', 'ServiceController@getUsers');

//Ruta del Dropdown dependiente de Departamento para Usuarios (Select) Actualizacion de Usuarios
Route::get('/update/dropdown2/{id}', 'ServiceController@getUsers');