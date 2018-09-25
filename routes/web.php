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

// Route::get('/', 'MantencionController@index')->name('home');
// Route::get('/home', 'MantencionController@index')->name('home');
Route::get('/', 'EquipoController@activos')->name('home');
Route::get('/home', 'EquipoController@activos')->name('home');

//Mantenciones
Route::get('/mantenciones/buscar', 'MantencionController@buscar');
Route::get('/mantenciones/autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::get('equipos/{codigo}/mantenciones', 'MantencionController@mantenciones');
Route::get('impresoras/{impresora}/mantenciones', 'MantencionController@mantenciones');
Route::get('okidatas/{okidata}/mantenciones', 'MantencionController@mantenciones');
Route::get('zebras/{zebra}/mantenciones', 'MantencionController@mantenciones');
Route::resource('mantenciones', 'MantencionController');


//Equipos
Route::get('/equipos/activos', 'EquipoController@activos');
Route::get('/equipos/debaja', 'EquipoController@debaja');
Route::get('/equipos/enrevision', 'EquipoController@enrevision');
Route::get('/equipos/contingencia', 'EquipoController@contingencia');
Route::get('equipos/{equipo}/mantencion', 'EquipoController@mantencion');
Route::resource('equipos', 'EquipoController');


//Notebooks
Route::get('/notebooks/activos', 'NotebookController@activos');
Route::get('/notebooks/debaja', 'NotebookController@debaja');
Route::get('/notebooks/enrevision', 'NotebookController@enrevision');
Route::get('/notebooks/contingencia', 'NotebookController@contingencia');
Route::get('notebooks/{equipo}/mantencion', 'NotebookController@mantencion');
Route::resource('notebooks', 'NotebookController');


//Impresoras
Route::get('/impresoras/debaja', 'ImpresorasController@debaja');
Route::get('/impresoras/activas', 'ImpresorasController@activas');
Route::get('/impresoras/enrevision', 'ImpresorasController@enrevision');
Route::get('/impresoras/contingencia', 'ImpresorasController@contingencia');
Route::get('impresoras/{impresora}/mantencion', 'ImpresorasController@mantencion');
Route::resource('impresoras', 'ImpresorasController');


//Okidatas
Route::get('/okidatas/debaja', 'OkidataController@debaja');
Route::get('/okidatas/activas', 'OkidataController@activas');
Route::get('/okidatas/enrevision', 'OkidataController@enrevision');
Route::get('/okidatas/contingencia', 'OkidataController@contingencia');
Route::get('okidatas/{okidata}/mantencion', 'OkidataController@mantencion');
Route::resource('okidatas', 'OkidataController');


//Zebras
Route::get('/zebras/debaja', 'ZebrasController@debaja');
Route::get('/zebras/activas', 'ZebrasController@activas');
Route::get('/zebras/enrevision', 'ZebrasController@enrevision');
Route::get('/zebras/contingencia', 'ZebrasController@contingencia');
Route::get('zebras/{zebra}/mantencion', 'ZebrasController@mantencion');
Route::resource('zebras', 'ZebrasController');


//Sistema Operativo
Route::get('/sistemaoperativo/{sistemaOperativo}/edit', 'SistemaOperativoController@edit');
Route::patch('/sistemaoperativo/{sistemaOperativo}', 'SistemaOperativoController@update');
Route::delete('/sistemaoperativo/{sistemaOperativo}', 'SistemaOperativoController@destroy');
Route::resource('sistemaoperativo', 'SistemaOperativoController');


//Sectores
Route::get('/sectores/{sector}/edit', 'SectorController@edit');
Route::patch('/sectores/{sector}', 'SectorController@update');
Route::delete('/sectores/{sector}', 'SectorController@destroy');
Route::resource('sectores','SectorController');

//Notebooks
Route::resource('notebooks','NotebookController');

//Encargados
Route::resource('encargados','EncargadoController');

//Revision
Route::resource('revisions','RevisionController');


Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');

Route::get ('/login', 'SessionController@create')->name('login');
Route::post ('/login', 'SessionController@store');
Route::get ('/logout', 'SessionController@destroy');

Auth::routes();