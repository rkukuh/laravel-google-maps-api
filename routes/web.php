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


    /******************************* STYLES ***********************************/

    Route::group(['prefix' => 'style'], function () {
        Route::get('map', [
            'as'    => 'style.styledMap',
            'uses'  => 'StyleController@styledMap',
        ]);

        Route::get('mapType', [
            'as'    => 'style.styledMapType',
            'uses'  => 'StyleController@styledMapType',
        ]);
    });


    /****************************** DRAWING ***********************************/

    Route::group(['prefix' => 'drawing'], function () {
        Route::get('simple-marker', [
            'as'    => 'drawing.simple-marker',
            'uses'  => 'DrawingController@simpleMarker',
        ]);

        Route::get('marker-label', [
            'as'    => 'drawing.marker-label',
            'uses'  => 'DrawingController@markerLabel',
        ]);

        Route::get('remove-marker', [
            'as'    => 'drawing.remove-marker',
            'uses'  => 'DrawingController@removeMarker',
        ]);

        Route::get('predefined-marker', [
            'as'    => 'drawing.predefined-marker',
            'uses'  => 'DrawingController@predefinedMarker',
        ]);

        Route::get('simple-marker-icon', [
            'as'    => 'drawing.simple-marker-icon',
            'uses'  => 'DrawingController@simpleMarkerIcon',
        ]);

        Route::get('complex-marker-icon', [
            'as'    => 'drawing.complex-marker-icon',
            'uses'  => 'DrawingController@complexMarkerIcon',
        ]);

        Route::get('custom-marker-icon', [
            'as'    => 'drawing.custom-marker-icon',
            'uses'  => 'DrawingController@customMarkerIcon',
        ]);

        Route::get('marker-animation', [
            'as'    => 'drawing.marker-animation',
            'uses'  => 'DrawingController@markerAnimation',
        ]);

        Route::get('marker-animation-timeout', [
            'as'    => 'drawing.marker-animation-timeout',
            'uses'  => 'DrawingController@markerAnimationTimeout',
        ]);

        Route::get('arrow-symbol', [
            'as'    => 'drawing.arrow-symbol',
            'uses'  => 'DrawingController@arrowSymbol',
        ]);

        Route::get('dashed-line', [
            'as'    => 'drawing.dashed-line',
            'uses'  => 'DrawingController@dashedLine',
        ]);

        Route::get('custom-symbol', [
            'as'    => 'drawing.custom-symbol',
            'uses'  => 'DrawingController@customSymbol',
        ]);

        Route::get('animate-symbol', [
            'as'    => 'drawing.animate-symbol',
            'uses'  => 'DrawingController@animateSymbol',
        ]);

        Route::get('info-window', [
            'as'    => 'drawing.info-window',
            'uses'  => 'DrawingController@infoWindow',
        ]);

        Route::get('info-window-maxwidth', [
            'as'    => 'drawing.info-window-maxwidth',
            'uses'  => 'DrawingController@infoWindowMaxwidth',
        ]);

        Route::get('simple-polyline', [
            'as'    => 'drawing.simple-polyline',
            'uses'  => 'DrawingController@simplePolyline',
        ]);

        Route::get('removing-polyline', [
            'as'    => 'drawing.removing-polyline',
            'uses'  => 'DrawingController@removingPolyline',
        ]);

        Route::get('complex-polyline', [
            'as'    => 'drawing.complex-polyline',
            'uses'  => 'DrawingController@complexPolyline',
        ]);

        Route::get('deleting-vertex', [
            'as'    => 'drawing.deleting-vertex',
            'uses'  => 'DrawingController@deletingVertex',
        ]);

        Route::get('simple-polygon', [
            'as'    => 'drawing.simple-polygon',
            'uses'  => 'DrawingController@simplePolygon',
        ]);

        Route::get('polygon-array', [
            'as'    => 'drawing.polygon-array',
            'uses'  => 'DrawingController@polygonArray',
        ]);

        Route::get('polygon-auto-completion', [
            'as'    => 'drawing.polygon-auto-completion',
            'uses'  => 'DrawingController@polygonAutoCompletion',
        ]);

        Route::get('polygon-hole', [
            'as'    => 'drawing.polygon-hole',
            'uses'  => 'DrawingController@polygonHole',
        ]);

        Route::get('polygon-draggable', [
            'as'    => 'drawing.polygon-draggable',
            'uses'  => 'DrawingController@polygonDraggable',
        ]);

        Route::get('circle', [
            'as'    => 'drawing.circle',
            'uses'  => 'DrawingController@circle',
        ]);

        Route::get('rectangle', [
            'as'    => 'drawing.rectangle',
            'uses'  => 'DrawingController@rectangle',
        ]);

        Route::get('rectangle-zoom', [
            'as'    => 'drawing.rectangle-zoom',
            'uses'  => 'DrawingController@rectangleZoom',
        ]);

        Route::get('editable-shape', [
            'as'    => 'drawing.editable-shape',
            'uses'  => 'DrawingController@editableShape',
        ]);

        Route::get('shape-event', [
            'as'    => 'drawing.shape-event',
            'uses'  => 'DrawingController@shapeEvent',
        ]);

        Route::get('ground-overlay', [
            'as'    => 'drawing.ground-overlay',
            'uses'  => 'DrawingController@groundOverlay',
        ]);

        Route::get('remove-overlay', [
            'as'    => 'drawing.remove-overlay',
            'uses'  => 'DrawingController@removeOverlay',
        ]);

        Route::get('custom-overlay', [
            'as'    => 'drawing.custom-overlay',
            'uses'  => 'DrawingController@customOverlay',
        ]);

        Route::get('show-hide-overlay', [
            'as'    => 'drawing.show-hide-overlay',
            'uses'  => 'DrawingController@showHideOverlay',
        ]);
    });


    /******************************* LAYER ************************************/

    Route::group(['prefix' => 'layer'], function () {
        Route::get('kml', [
            'as'    => 'layer.kml',
            'uses'  => 'LayerController@kml',
        ]);

        Route::get('kml-feature', [
            'as'    => 'layer.kml-feature',
            'uses'  => 'LayerController@kmlFeature',
        ]);

        Route::get('data-simple', [
            'as'    => 'layer.data-simple',
            'uses'  => 'LayerController@dataSimple',
        ]);

        Route::get('data-styling', [
            'as'    => 'layer.data-styling',
            'uses'  => 'LayerController@dataStyling',
        ]);

        Route::get('data-event', [
            'as'    => 'layer.data-event',
            'uses'  => 'LayerController@dataEvent',
        ]);

        Route::get('data-dynamic', [
            'as'    => 'layer.data-dynamic',
            'uses'  => 'LayerController@dataDynamic',
        ]);

        Route::get('data-polygon', [
            'as'    => 'layer.data-polygon',
            'uses'  => 'LayerController@dataPolygon',
        ]);

        Route::get('data-dragdrop-geojson', [
            'as'    => 'layer.data-dragdrop-geojson',
            'uses'  => 'LayerController@dataDragDropGeoJson',
        ]);

        Route::get('data-earthquake', [
            'as'    => 'layer.data-earthquake',
            'uses'  => 'LayerController@dataEarthquake',
        ]);

        Route::get('heatmap', [
            'as'    => 'layer.heatmap',
            'uses'  => 'LayerController@heatMap',
        ]);

        Route::get('fusion-table-layer', [
            'as'    => 'layer.fusion-table-layer',
            'uses'  => 'LayerController@fusionTableLayer',
        ]);

        Route::get('fusion-table-query', [
            'as'    => 'layer.fusion-table-query',
            'uses'  => 'LayerController@fusionTableQuery',
        ]);

        Route::get('fusion-table-heatmap', [
            'as'    => 'layer.fusion-table-heatmap',
            'uses'  => 'LayerController@fusionTableHeatmap',
        ]);

        Route::get('fusion-table-styling', [
            'as'    => 'layer.fusion-table-styling',
            'uses'  => 'LayerController@fusionTableStyling',
        ]);

        Route::get('geo-rss', [
            'as'    => 'layer.geo-rss',
            'uses'  => 'LayerController@geoRss',
        ]);

        Route::get('traffic', [
            'as'    => 'layer.traffic',
            'uses'  => 'LayerController@traffic',
        ]);

        Route::get('transit', [
            'as'    => 'layer.transit',
            'uses'  => 'LayerController@transit',
        ]);

        Route::get('bicycling', [
            'as'    => 'layer.bicycling',
            'uses'  => 'LayerController@bicycling',
        ]);
    });


    /******************************* MAP TYPE *********************************/

    Route::group(['prefix' => 'maptype'], function () {
        Route::get('basic', [
            'as'    => 'maptype.basic',
            'uses'  => 'MapTypeController@basic',
        ]);

        Route::get('overlay', [
            'as'    => 'maptype.overlay',
            'uses'  => 'MapTypeController@overlay',
        ]);

        Route::get('image', [
            'as'    => 'maptype.image',
            'uses'  => 'MapTypeController@image',
        ]);

        Route::get('image-overlay', [
            'as'    => 'maptype.image-overlay',
            'uses'  => 'MapTypeController@imageOverlay',
        ]);

        Route::get('45-degree', [
            'as'    => 'maptype.45-degree',
            'uses'  => 'MapTypeController@degree45',
        ]);

        Route::get('rotating-45-degree', [
            'as'    => 'maptype.rotating-45-degree',
            'uses'  => 'MapTypeController@degree45rotating',
        ]);
    });


    /******************************* SERVICE **********************************/

    Route::group(['prefix' => 'service'], function () {
        Route::get('geocoding', [
            'as'    => 'service.geocoding',
            'uses'  => 'ServiceController@geocoding',
        ]);

        Route::get('geocoding-reverse', [
            'as'    => 'service.geocoding-reverse',
            'uses'  => 'ServiceController@geocodingReverse',
        ]);

        Route::get('geocoding-reverse-placeid', [
            'as'    => 'service.geocoding-reverse-placeid',
            'uses'  => 'ServiceController@geocodingReversePlaceId',
        ]);

        Route::get('geocoding-component-restriction', [
            'as'    => 'service.geocoding-component-restriction',
            'uses'  => 'ServiceController@geocodingComponentRestrion',
        ]);

        Route::get('region-biasing-es', [
            'as'    => 'service.region-biasing-es',
            'uses'  => 'ServiceController@regionBiasingEs',
        ]);

        Route::get('region-biasing-us', [
            'as'    => 'service.region-biasing-us',
            'uses'  => 'ServiceController@regionBiasingUs',
        ]);

        Route::get('direction', [
            'as'    => 'service.direction',
            'uses'  => 'ServiceController@direction',
        ]);

        Route::get('direction-panel', [
            'as'    => 'service.direction-panel',
            'uses'  => 'ServiceController@directionPanel',
        ]);

        Route::get('direction-complex', [
            'as'    => 'service.direction-complex',
            'uses'  => 'ServiceController@directionComplex',
        ]);

        Route::get('travel-mode', [
            'as'    => 'service.travel-mode',
            'uses'  => 'ServiceController@travelMode',
        ]);

        Route::get('waypoint', [
            'as'    => 'service.waypoint',
            'uses'  => 'ServiceController@waypoint',
        ]);

        Route::get('direction-draggable', [
            'as'    => 'service.direction-draggable',
            'uses'  => 'ServiceController@directionDraggable',
        ]);

        Route::get('distance-matrix', [
            'as'    => 'service.distance-matrix',
            'uses'  => 'ServiceController@distanceMatrix',
        ]);

        Route::get('elevation', [
            'as'    => 'service.elevation',
            'uses'  => 'ServiceController@elevation',
        ]);

        Route::get('elevation-path', [
            'as'    => 'service.elevation-path',
            'uses'  => 'ServiceController@elevationPath',
        ]);

        Route::get('streetview', [
            'as'    => 'service.streetview',
            'uses'  => 'ServiceController@streetview',
        ]);

        Route::get('streetview-sidebyside', [
            'as'    => 'service.streetview-sidebyside',
            'uses'  => 'ServiceController@streetviewSideBySide',
        ]);

        Route::get('streetview-overlay', [
            'as'    => 'service.streetview-overlay',
            'uses'  => 'ServiceController@streetviewOverlay',
        ]);

        Route::get('streetview-event', [
            'as'    => 'service.streetview-event',
            'uses'  => 'ServiceController@streetviewEvent',
        ]);

        Route::get('streetview-control', [
            'as'    => 'service.streetview-control',
            'uses'  => 'ServiceController@streetviewControl',
        ]);

        Route::get('streetview-data', [
            'as'    => 'service.streetview-data',
            'uses'  => 'ServiceController@streetviewData',
        ]);

        Route::get('streetview-panorama', [
            'as'    => 'service.streetview-panorama',
            'uses'  => 'ServiceController@streetviewPanorama',
        ]);

        Route::get('streetview-panorama-tiles', [
            'as'    => 'service.streetview-panorama-tiles',
            'uses'  => 'ServiceController@streetviewPanoramaTiles',
        ]);

        Route::get('maximum-zoom', [
            'as'    => 'service.maximum-zoom',
            'uses'  => 'ServiceController@maximumZoom',
        ]);
    });


    /******************************* LIBRARY **********************************/

    Route::group(['prefix' => 'library'], function () {
        Route::get('drawing', [
            'as'    => 'library.drawing',
            'uses'  => 'LibraryController@drawing',
        ]);

        Route::get('geometry-navigation', [
            'as'    => 'library.geometry-navigation',
            'uses'  => 'LibraryController@geometryNavigation',
        ]);

        Route::get('geometry-encoding', [
            'as'    => 'library.geometry-encoding',
            'uses'  => 'LibraryController@geometryEncoding',
        ]);

        Route::get('geometry-location', [
            'as'    => 'library.geometry-location',
            'uses'  => 'LibraryController@geometryContainsLocation',
        ]);

        Route::get('places-search', [
            'as'    => 'library.places-search',
            'uses'  => 'LibraryController@placeSearch',
        ]);
    });


    /********************************* TEST ***********************************/

    Route::group(['prefix' => 'test'], function () {
        Route::get('proximity-search', function () {
            return view('test.proximity-search');
        });
    });

});
