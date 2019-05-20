<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('singup', 'AuthController@singup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


});

/**
 * Api RestFull Generico
 */

Route::get('get-all-estados', 'ResourceControllers\EstadoRadicadoController@index');
Route::get('get-all-tipo-pqrs', 'ResourceControllers\TipoPqrsController@index');

/**
 * API RestFull Custom
 */

Route::prefix('radicado')->group(function () {
    Route::get('get-tipo-pqrs', 'CustomsControllers\Radicado\RadicadoController@getTipoPqrs');
    Route::post('create-radicado', 'CustomsControllers\Radicado\RadicadoController@createRadicado');
});

Route::prefix('dashboard-radicado')->group(function () {
    Route::get('get-lista-radicado', 'CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicado');
    Route::get('get-lista-radicado-reclamo', 'CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicadoByReclamo');
    Route::get('get-lista-radicado-queja', 'CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicadoByQueja');
    Route::get('get-lista-radicado-sugerencia', 'CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicadoBySugerencia');
    Route::post('edit-estado-radicado/{id}', 'CustomsControllers\DashboardRadicado\DashboardRadicadoController@editEstadoRadicadoByid');


});

