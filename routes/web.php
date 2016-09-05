<?php

Auth::loginUsingId(1);

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

    Route::get('basic/map-language', [
        'as'    => 'basic.map-language',
        'uses'  => 'BasicController@mapLanguage',
    ]);

    Route::get('basic/map-rtl', [
        'as'    => 'basic.map-rtl',
        'uses'  => 'BasicController@mapRtl',
    ]);

    Route::get('basic/map-sync', [
        'as'    => 'basic.map-sync',
        'uses'  => 'BasicController@mapSync',
    ]);

    Route::get('basic/projection-simple', [
        'as'    => 'basic.projection-simple',
        'uses'  => 'BasicController@projectionSimple',
    ]);


    /***************************** SIGNED-IN **********************************/

    Route::get('signedin/signedin', [
        'as'    => 'signedin.signedin',
        'uses'  => 'SignedinController@signedIn',
    ]);

    Route::get('signedin/save-infowindow', [
        'as'    => 'signedin.save-infowindow',
        'uses'  => 'SignedinController@saveInfoWindow',
    ]);

    Route::get('signedin/save-widget', [
        'as'    => 'signedin.save-widget',
        'uses'  => 'SignedinController@saveWidget',
    ]);


    /******************************* EVENTS ***********************************/

    Route::get('event/simple-click', [
        'as'    => 'event.simple-click',
        'uses'  => 'EventController@simpleClick',
    ]);

    Route::get('event/closure', [
        'as'    => 'event.closure',
        'uses'  => 'EventController@eventClosure',
    ]);

    Route::get('event/argument', [
        'as'    => 'event.argument',
        'uses'  => 'EventController@eventArgument',
    ]);

    Route::get('event/property', [
        'as'    => 'event.property',
        'uses'  => 'EventController@eventProperty',
    ]);

});
