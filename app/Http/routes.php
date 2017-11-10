<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "EmpresaController@searchScreen");

Route::post("/find", 'EmpresaController@find');

Route::auth();


Route::get('/home', 'HomeController@index');

Route::get( '/addEmpresa', 'EmpresaController@addBusiness');


Route::post( '/estados', 'EstadoController@getEstados' );
Route::post( '/saveBusiness', 'EmpresaController@saveBusiness' );