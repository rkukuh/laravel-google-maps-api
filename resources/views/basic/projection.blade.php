@extends('layouts.app')

@section('title', 'Custom map projections')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom map projections
    </h1>

    <div id="map"></div>
    <div id="coords"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #coords {
            font-size: 20px;
            background-color: white;
            color: black;
            padding: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 0,
                center: {lat: 0, lng: 0},
                mapTypeControl: false
            });

            initGallPeters();

            map.mapTypes.set('gallPeters', gallPetersMapType);
            map.setMapTypeId('gallPeters');

            var coordsDiv = document.getElementById('coords');

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(coordsDiv);
            map.addListener('mousemove', function(event) {
                coordsDiv.textContent =
                    'lat: ' + Math.round(event.latLng.lat()) + ', ' +
                    'lng: ' + Math.round(event.latLng.lng());
            });

            map.data.setStyle(function(feature) {
                return {
                    title: feature.getProperty('name'),
                    optimized: false
                };
            });

            map.data.addGeoJson(cities);
        }

        var gallPetersMapType;

        function initGallPeters() {
            var GALL_PETERS_RANGE_X = 800;
            var GALL_PETERS_RANGE_Y = 512;

            gallPetersMapType = new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    var scale = 1 << zoom;

                    var x = ((coord.x % scale) + scale) % scale;
                    var y = coord.y;

                    if (y < 0 || y >= scale) return null;

                    return 'https://developers.google.com/maps/documentation/' +
                           'javascript/examples/full/images/gall-peters_' + zoom +
                           '_' + x + '_' + y + '.png';
                },
                tileSize: new google.maps.Size(GALL_PETERS_RANGE_X, GALL_PETERS_RANGE_Y),
                isPng: true,
                minZoom: 0,
                maxZoom: 1,
                name: 'Gall-Peters'
            });

            gallPetersMapType.projection = {
                fromLatLngToPoint: function(latLng) {
                    var latRadians = latLng.lat() * Math.PI / 180;

                    return new google.maps.Point(
                        GALL_PETERS_RANGE_X * (0.5 + latLng.lng() / 360),
                        GALL_PETERS_RANGE_Y * (0.5 - 0.5 * Math.sin(latRadians))
                    );
                },
                fromPointToLatLng: function(point, noWrap) {
                    var x = point.x / GALL_PETERS_RANGE_X;
                    var y = Math.max(0, Math.min(1, point.y / GALL_PETERS_RANGE_Y));

                    return new google.maps.LatLng(
                        Math.asin(1 - 2 * y) * 180 / Math.PI,
                        -180 + 360 * x,
                        noWrap
                    );
                }
            };
        }

        var cities = {
            type: 'FeatureCollection',
            features: [{
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [-87.650, 41.850]},
                properties: {name: 'Chicago'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [-149.900, 61.218]},
                properties: {name: 'Anchorage'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [-99.127, 19.427]},
                properties: {name: 'Mexico City'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [-0.126, 51.500]},
                properties: {name: 'London'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [28.045, -26.201]},
                properties: {name: 'Johannesburg'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [15.322, -4.325]},
                properties: {name: 'Kinshasa'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [151.207, -33.867]},
                properties: {name: 'Sydney'}
            }, {
                type: 'Feature',
                geometry: {type: 'Point', coordinates: [0, 0]},
                properties: {name: '0°N 0°E'}
            }]
        };
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example defines an image map type using the Gall-Peters projection.
        // https://en.wikipedia.org/wiki/Gall%E2%80%93Peters_projection

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom: 0,
                center: {lat: 0, lng: 0},
                mapTypeControl: false
            });

            initGallPeters();

            map.mapTypes.set(&apos;gallPeters&apos;, gallPetersMapType);
            map.setMapTypeId(&apos;gallPeters&apos;);

            // Show the lat and lng under the mouse cursor.
            var coordsDiv = document.getElementById(&apos;coords&apos;);

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(coordsDiv);
            map.addListener(&apos;mousemove&apos;, function(event) {
                coordsDiv.textContent =
                    &apos;lat: &apos; + Math.round(event.latLng.lat()) + &apos;, &apos; +
                    &apos;lng: &apos; + Math.round(event.latLng.lng());
            });

            // Add some markers to the map.
            map.data.setStyle(function(feature) {
                return {
                    title: feature.getProperty(&apos;name&apos;),
                    optimized: false
                };
            });

            map.data.addGeoJson(cities);
        }

        var gallPetersMapType;

        function initGallPeters() {
            var GALL_PETERS_RANGE_X = 800;
            var GALL_PETERS_RANGE_Y = 512;

            // Fetch Gall-Peters tiles stored locally on our server.
            gallPetersMapType = new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    var scale = 1 &lt;&lt; zoom;

                    // Wrap tiles horizontally.
                    var x = ((coord.x % scale) + scale) % scale;

                    // Don&apos;t wrap tiles vertically.
                    var y = coord.y;

                    if (y &lt; 0 || y &gt;= scale) return null;

                    return &apos;https://developers.google.com/maps/documentation/&apos; +
                           &apos;javascript/examples/full/images/gall-peters_&apos; + zoom +
                           &apos;_&apos; + x + &apos;_&apos; + y + &apos;.png&apos;;
                },
                tileSize: new google.maps.Size(GALL_PETERS_RANGE_X, GALL_PETERS_RANGE_Y),
                isPng: true,
                minZoom: 0,
                maxZoom: 1,
                name: &apos;Gall-Peters&apos;
            });

            // Describe the Gall-Peters projection used by these tiles.
            gallPetersMapType.projection = {
                fromLatLngToPoint: function(latLng) {
                    var latRadians = latLng.lat() * Math.PI / 180;

                    return new google.maps.Point(
                        GALL_PETERS_RANGE_X * (0.5 + latLng.lng() / 360),
                        GALL_PETERS_RANGE_Y * (0.5 - 0.5 * Math.sin(latRadians))
                    );
                },
                fromPointToLatLng: function(point, noWrap) {
                    var x = point.x / GALL_PETERS_RANGE_X;
                    var y = Math.max(0, Math.min(1, point.y / GALL_PETERS_RANGE_Y));

                    return new google.maps.LatLng(
                        Math.asin(1 - 2 * y) * 180 / Math.PI,
                        -180 + 360 * x,
                        noWrap
                    );
                }
            };
        }

        // GeoJSON, describing the locations and names of some cities.
        var cities = {
            type: &apos;FeatureCollection&apos;,
            features: [{
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [-87.650, 41.850]},
                properties: {name: &apos;Chicago&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [-149.900, 61.218]},
                properties: {name: &apos;Anchorage&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [-99.127, 19.427]},
                properties: {name: &apos;Mexico City&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [-0.126, 51.500]},
                properties: {name: &apos;London&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [28.045, -26.201]},
                properties: {name: &apos;Johannesburg&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [15.322, -4.325]},
                properties: {name: &apos;Kinshasa&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [151.207, -33.867]},
                properties: {name: &apos;Sydney&apos;}
            }, {
                type: &apos;Feature&apos;,
                geometry: {type: &apos;Point&apos;, coordinates: [0, 0]},
                properties: {name: &apos;0&deg;N 0&deg;E&apos;}
            }]
        };
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }

    #coords {
        font-size: 20px;
        background-color: white;
        color: black;
        padding: 10px;
    }
@endsection

@section('source-code-html')
    <div id="map"></div>
    <div id="coords"></div>
@endsection
