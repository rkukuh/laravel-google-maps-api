@extends('layouts.app')

@section('title', 'Data Layer: Earthquake')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Earthquake
    </h1>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active">
                <a href="#default" data-toggle="tab">Default</a>
            </li>
            <li>
                <a href="#simple" data-toggle="tab">Simple</a>
            </li>

            <li>
                <a href="#advanced" data-toggle="tab">Advanced</a>
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
            <div class="tab-pane" id="advanced">
                <div id="map-advanced"></div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #map-default,
        #map-simple,
        #map-advanced {
            height: 450px;
        }
    </style>
@endpush

@push('js')
    <script>
        var map_default;
        var map_simple;
        var map_advanced;

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

            // Map Advanced
            map_advanced = new google.maps.Map(document.getElementById('map-advanced'), {
                center  : { lat: 20, lng: -160 },
                zoom    : 2,
                styles  : mapStyle
            });

            map_advanced.data.setStyle(styleFeature);

            function styleFeature(feature) {
                var low     = [151, 83, 34];    // color of mag 1.0
                var high    = [5, 69, 54];     // color of mag 6.0 and above
                var minMag  = 1.0;
                var maxMag  = 6.0;

                // fraction represents where the value sits between the min and max
                var fraction    = (Math.min(feature.getProperty('mag'), maxMag) - minMag) / (maxMag - minMag);
                var color       = interpolateHsl(low, high, fraction);

                return {
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        strokeWeight: 0.5,
                        strokeColor: '#fff',
                        fillColor: color,
                        fillOpacity: 2 / feature.getProperty('mag'),

                        // while an exponent would technically be correct, quadratic looks nicer
                        scale: Math.pow(feature.getProperty('mag'), 2)
                    },
                    zIndex: Math.floor(feature.getProperty('mag'))
                };
            }

            function interpolateHsl(lowHsl, highHsl, fraction) {
                var color = [];

                for (var i = 0; i < 3; i++) {
                    // Calculate color based on the fraction.
                    color[i] = (highHsl[i] - lowHsl[i]) * fraction + lowHsl[i];
                }

                return 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)';
            }

            var mapStyle = [
                {
                    'featureType': 'all',
                    'elementType': 'all',
                    'stylers': [{'visibility': 'off'}]
                }, {
                    'featureType': 'landscape',
                    'elementType': 'geometry',
                    'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
                }, {
                    'featureType': 'water',
                    'elementType': 'labels',
                    'stylers': [{'visibility': 'off'}]
                }, {
                    'featureType': 'water',
                    'elementType': 'geometry',
                    'stylers': [{'visibility': 'on'}, {'hue': '#5f94ff'}, {'lightness': 60}]
                }
            ];

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
            map_advanced.data.addGeoJson(data);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
