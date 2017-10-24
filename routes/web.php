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
    return view('index');
});

//Equipos
Route::get('/equipos/debaja', 'EquipoController@debaja');
Route::get('/equipos/activos', 'EquipoController@activos');
Route::resource('equipos', 'EquipoController');

//Impresoras

/*Route::get('/impresoras', 'ImpresorasController@index');
Route::get('/impresoras/{impresora}/edit', 'ImpresorasController@edit');
Route::get('/impresoras/cod/{codigo}', 'ImpresorasController@show');
Route::patch('/impresoras/{impresora}', 'ImpresorasController@update');
Route::get('/impresoras/create', 'ImpresorasController@create');
Route::post('/impresoras', 'ImpresorasController@store');
Route::delete('/impresoras/{id}', 'ImpresorasController@destroy');*/
Route::get('/impresoras/debaja', 'ImpresorasController@debaja');
Route::get('/impresoras/activas', 'ImpresorasController@activas');
//Esta ruta reemplaza a todas las rutas comentadas
Route::resource('impresoras', 'ImpresorasController');



//Zebras
Route::get('/zebras/debaja', 'ZebrasController@debaja');
Route::get('/zebras/activas', 'ZebrasController@activas');
Route::resource('zebras', 'ZebrasController');


//Sistema Operativo
Route::get('/sistemaoperativo', 'SistemaOperativoController@index');
Route::get('/sistemaoperativo/create', 'SistemaOperativoController@create');
Route::get('/sistemaoperativo/{sistemaOperativo}/edit', 'SistemaOperativoController@edit');
Route::patch('/sistemaoperativo/{sistemaOperativo}', 'SistemaOperativoController@update');
Route::post('/sistemaoperativo', 'SistemaOperativoController@store');
Route::delete('/sistemaoperativo/{sistemaOperativo}', 'SistemaOperativoController@destroy');
//Route::resource('sistemaoperativo', 'SistemaOperativoController'); //No funciona bien debido a no seguir la norma de nombres (tablas)

//Okidatas
Route::get('/okidatas/debaja', 'OkidataController@debaja');
Route::get('/okidatas/activas', 'OkidataController@activas');
Route::resource('okidatas', 'OkidataController');