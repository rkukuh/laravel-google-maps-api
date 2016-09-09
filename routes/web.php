<?php

Auth::loginUsingId(1);

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    /******************************* BASIC ************************************/

    Route::group(['prefix' => 'basic'], function () {
        Route::get('simple', [
            'as'    => 'basic.simple',
            'uses'  => 'BasicController@simple',
        ]);

        Route::get('map-coordinates', [
            'as'    => 'basic.map-coordinates',
            'uses'  => 'BasicController@mapCoordinates',
        ]);

        Route::get('map-geolocation', [
            'as'    => 'basic.map-geolocation',
            'uses'  => 'BasicController@mapGeolocation',
        ]);

        Route::get('map-language', [
            'as'    => 'basic.map-language',
            'uses'  => 'BasicController@mapLanguage',
        ]);

        Route::get('map-rtl', [
            'as'    => 'basic.map-rtl',
            'uses'  => 'BasicController@mapRtl',
        ]);

        Route::get('map-sync', [
            'as'    => 'basic.map-sync',
            'uses'  => 'BasicController@mapSync',
        ]);

        Route::get('projection-simple', [
            'as'    => 'basic.projection-simple',
            'uses'  => 'BasicController@projectionSimple',
        ]);
    });


    /***************************** SIGNED-IN **********************************/

    Route::group(['prefix' => 'signedin'], function () {
        Route::get('signedin', [
            'as'    => 'signedin.signedin',
            'uses'  => 'SignedinController@signedIn',
        ]);

        Route::get('save-infowindow', [
            'as'    => 'signedin.save-infowindow',
            'uses'  => 'SignedinController@saveInfoWindow',
        ]);

        Route::get('save-widget', [
            'as'    => 'signedin.save-widget',
            'uses'  => 'SignedinController@saveWidget',
        ]);
    });


    /******************************* EVENTS ***********************************/

    Route::group(['prefix' => 'event'], function () {
        Route::get('simple-click', [
            'as'    => 'event.simple-click',
            'uses'  => 'EventController@simpleClick',
        ]);

        Route::get('closure', [
            'as'    => 'event.closure',
            'uses'  => 'EventController@eventClosure',
        ]);

        Route::get('argument', [
            'as'    => 'event.argument',
            'uses'  => 'EventController@eventArgument',
        ]);

        Route::get('property', [
            'as'    => 'event.property',
            'uses'  => 'EventController@eventProperty',
        ]);

        Route::get('dom-listener', [
            'as'    => 'event.dom-listener',
            'uses'  => 'EventController@domListener',
        ]);
    });


    /****************************** CONTROLS **********************************/

    Route::group(['prefix' => 'control'], function () {
        Route::get('default', [
            'as'    => 'control.default',
            'uses'  => 'ControlController@defaultController',
        ]);

        Route::get('disable-ui', [
            'as'    => 'control.disable-ui',
            'uses'  => 'ControlController@disableUi',
        ]);

        Route::get('add-control', [
            'as'    => 'control.add-control',
            'uses'  => 'ControlController@addControl',
        ]);

        Route::get('options', [
            'as'    => 'control.options',
            'uses'  => 'ControlController@options',
        ]);

        Route::get('positioning', [
            'as'    => 'control.positioning',
            'uses'  => 'ControlController@positioning',
        ]);

        Route::get('custom', [
            'as'    => 'control.custom',
            'uses'  => 'ControlController@custom',
        ]);

        Route::get('state', [
            'as'    => 'control.state',
            'uses'  => 'ControlController@state',
        ]);
    });


    /********************************* TEST ***********************************/

    Route::group(['prefix' => 'test'], function () {
        Route::get('proximity-search', function () {
            return view('test.proximity-search');
        });
    });

});
