<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api',
//    'prefix' => 'auth'

], function () {

    Route::post('test',function(){
        return 'hola mundo';
    });

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

