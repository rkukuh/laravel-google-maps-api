@extends('layouts.app')

@section('title', 'Data Layer: Earthquake')

@section('content')
    <h1>Data Layer: Earthquake</h1>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active">
                <a href="#default" data-toggle="tab">Default</a>
            </li>
            <li>
                <a href="#simple" data-toggle="tab">Simple</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="default">
                <div id="map-default"></div>
            </div>
            <div class="tab-pane" id="simple">
                <div id="map-simple"></div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #map-default,
        #map-simple {
            height: 450px;
        }
    </style>
@endpush

@push('js')
    <script>
        var map_default;
        var map_simple;

        function initMap() {
            // Map Default
            map_default = new google.maps.Map(document.getElementById('map-default'), {
                center  : { lat: 20, lng: -160 },
                zoom    : 2
            });

            // Map Simple
            map_simple = new google.maps.Map(document.getElementById('map-simple'), {
                center  : { lat: 20, lng: -160 },
                zoom    : 2
            });

            // Add a basic style to map simple.
            map_simple.data.setStyle(function(feature) {
                var mag = Math.exp(parseFloat(feature.getProperty('mag'))) * 0.1;

                return /** @type {google.maps.Data.StyleOptions} */({
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: mag,
                        fillColor: '#f00',
                        fillOpacity: 0.35,
                        strokeWeight: 0
                    }
                });
            });

            // Get the earthquake data (JSONP format) from the USGS feed:
            // http://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
            var script = document.createElement('script');

            script.setAttribute(
                'src',
                'https://storage.googleapis.com/mapsdevsite/json/quakes.geo.json'
            );

            document.getElementsByTagName('head')[0].appendChild(script);
        }

        // Defines the callback function referenced in the jsonp file.
        function eqfeed_callback(data) {
            map_default.data.addGeoJson(data);
            map_simple.data.addGeoJson(data);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
