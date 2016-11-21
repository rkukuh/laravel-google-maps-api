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

@section('source-code-javascript')

    &lt;script&gt;
        var map_default;
        var map_simple;
        var map_advanced;

        function initMap() {
            // Map Default
            map_default = new google.maps.Map(document.getElementById(&apos;map-default&apos;), {
                center  : { lat: 20, lng: -160 },
                zoom    : 2
            });

            // Map Simple
            map_simple = new google.maps.Map(document.getElementById(&apos;map-simple&apos;), {
                center  : { lat: 20, lng: -160 },
                zoom    : 2
            });

            // Add a basic style to map simple.
            map_simple.data.setStyle(function(feature) {
                var mag = Math.exp(parseFloat(feature.getProperty(&apos;mag&apos;))) * 0.1;

                return /** @type {google.maps.Data.StyleOptions} */({
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: mag,
                        fillColor: &apos;#f00&apos;,
                        fillOpacity: 0.35,
                        strokeWeight: 0
                    }
                });
            });

            // Map Advanced
            map_advanced = new google.maps.Map(document.getElementById(&apos;map-advanced&apos;), {
                center  : { lat: 20, lng: -160 },
                zoom    : 2,
                styles  : mapStyle
            });

            map_advanced.data.setStyle(styleFeature);

            function styleFeature(feature) {
                var low     = [151, 83, 34];    // color of mag 1.0
                var high    = [5, 69, 54];      // color of mag 6.0 and above
                var minMag  = 1.0;
                var maxMag  = 6.0;

                // fraction represents where the value sits between the min and max
                var fraction    = (Math.min(feature.getProperty(&apos;mag&apos;), maxMag) - minMag) / (maxMag - minMag);
                var color       = interpolateHsl(low, high, fraction);

                return {
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        strokeWeight: 0.5,
                        strokeColor: &apos;#fff&apos;,
                        fillColor: color,
                        fillOpacity: 2 / feature.getProperty(&apos;mag&apos;),

                        // while an exponent would technically be correct, quadratic looks nicer
                        scale: Math.pow(feature.getProperty(&apos;mag&apos;), 2)
                    },
                    zIndex: Math.floor(feature.getProperty(&apos;mag&apos;))
                };
            }

            function interpolateHsl(lowHsl, highHsl, fraction) {
                var color = [];

                for (var i = 0; i &lt; 3; i++) {
                    // Calculate color based on the fraction.
                    color[i] = (highHsl[i] - lowHsl[i]) * fraction + lowHsl[i];
                }

                return &apos;hsl(&apos; + color[0] + &apos;,&apos; + color[1] + &apos;%,&apos; + color[2] + &apos;%)&apos;;
            }

            var mapStyle = [
                {
                    &apos;featureType&apos;: &apos;all&apos;,
                    &apos;elementType&apos;: &apos;all&apos;,
                    &apos;stylers&apos;: [{&apos;visibility&apos;: &apos;off&apos;}]
                }, {
                    &apos;featureType&apos;: &apos;landscape&apos;,
                    &apos;elementType&apos;: &apos;geometry&apos;,
                    &apos;stylers&apos;: [{&apos;visibility&apos;: &apos;on&apos;}, {&apos;color&apos;: &apos;#fcfcfc&apos;}]
                }, {
                    &apos;featureType&apos;: &apos;water&apos;,
                    &apos;elementType&apos;: &apos;labels&apos;,
                    &apos;stylers&apos;: [{&apos;visibility&apos;: &apos;off&apos;}]
                }, {
                    &apos;featureType&apos;: &apos;water&apos;,
                    &apos;elementType&apos;: &apos;geometry&apos;,
                    &apos;stylers&apos;: [{&apos;visibility&apos;: &apos;on&apos;}, {&apos;hue&apos;: &apos;#5f94ff&apos;}, {&apos;lightness&apos;: 60}]
                }
            ];

            // Get the earthquake data (JSONP format) from the USGS feed:
            // http://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
            var script = document.createElement(&apos;script&apos;);

            script.setAttribute(
                &apos;src&apos;,
                &apos;https://storage.googleapis.com/mapsdevsite/json/quakes.geo.json&apos;
            );

            document.getElementsByTagName(&apos;head&apos;)[0].appendChild(script);
        }

        // Defines the callback function referenced in the jsonp file.
        function eqfeed_callback(data) {
            map_default.data.addGeoJson(data);
            map_simple.data.addGeoJson(data);
            map_advanced.data.addGeoJson(data);
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    
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
