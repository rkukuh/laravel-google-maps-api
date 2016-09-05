<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('basic/simple', [
        'as'    => 'basic.simple',
        'uses'  => 'BasicController@simple',
    ]);

});
