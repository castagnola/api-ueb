<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {



    Route::post('test', function () {
        return 'hola mundo';
    });

    Route::post('login', 'AuthController@login');
    Route::post('singup', 'AuthController@singup');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('get-lista-radicado','CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicado');


});

Route::prefix('radicado')->group(function () {
    Route::get('get-tipo-pqrs', 'CustomsControllers\Radicado\RadicadoController@getTipoPqrs');
    Route::post('create-radicado', 'CustomsControllers\Radicado\RadicadoController@createRadicado');
});

Route::prefix('dashboard-radicado')->group(function () {
    Route::get('get-lista-radicado','CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicado');
    Route::get('get-lista-radicado-reclamo','CustomsControllers\DashboardRadicado\DashboardRadicadoController@getListaRadicadoByReclamo');


});

