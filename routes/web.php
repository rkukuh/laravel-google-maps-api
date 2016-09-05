<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    /******************************* BASIC ************************************/

    Route::get('basic/simple', [
        'as'    => 'basic.simple',
        'uses'  => 'BasicController@simple',
    ]);

    Route::get('basic/map-coordinates', [
        'as'    => 'basic.map-coordinates',
        'uses'  => 'BasicController@mapCoordinates',
    ]);

    Route::get('basic/map-geolocation', [
        'as'    => 'basic.map-geolocation',
        'uses'  => 'BasicController@mapGeolocation',
    ]);

});
