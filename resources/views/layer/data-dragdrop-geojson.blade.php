@extends('layouts.app')

@section('title', 'Data Layer: Drag-Drop GeoJson')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Drag-Drop GeoJson
    </h1>

    <div id="map"></div>
    <div id="drop-container">
        <div id="drop-silhouette"></div>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #drop-container {
            display: none;
            height: 100%;
            width: 100%;
            position: absolute;
            z-index: 1;
            top: 0px;
            left: 0px;
            padding: 20px;
            background-color: rgba(100, 100, 100, 0.5);
        }

        #drop-silhouette {
            color: white;
            border: white dashed 8px;
            height: calc(100% - 56px);
            width: calc(100% - 56px);
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAAZiS0dEAGQAZABkkPCsTwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB90LHAIvICWdsKwAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAACdklEQVR42u3csU7icBzA8Xp3GBMSeRITH8JHMY7cRMvmVmXoE9TAcJubhjD4ApoiopgqDMWAKAgIcSAiCfxuwhwROVJbkPD9rP23ob8vpZCQKgoAAAAAAAAAAPDYyiK/eNM05bNtr6+vSjgcXiHxDMkE1WpVFvGcfpCVICAIQUAQgoAgBAFBCAKCgCAEAUEIAoIQBAQhCAgCghAEBCEICEIQEIQgIAgIQhAQhCAgCEFAEIKAICAIQUAQgoAgBAFBCDIzhmFINBo9/K6D0XVddnd3ZaneDY7jSCqVcn3SfjyeKRKJbJ2dnYllWbKUl2i5XJaXlxdJJBIy7yDHx8fy9vYm6XR6OWMM3d/fi4hIqVSSWCwmsw5ycHAgrVZLRETOz8+XO8ZQpVJ5H2Y6nRZN0/b9DqLruhSLxfd9MpkMMT6L0uv1JJlMih9BhveJwWDwvv7i4oIY4zw8PIwMtt1uSzweF6+CHB0dSbfbHVmbzWaJMcnj4+OHAd/d3cne3p64DWKapjw/P39Yd3l5SYxpVKvVsYO2LEtUVd2ZNoiu6+I4ztg1V1dXxPAiSq/Xk5OTk0k9pNVqyenp6ch94l+5XI4YbtRqNfHa9fX1t43xcwGa/Nnc3PwdDAY9OZht28rGxgZPvP6KSCSy9fT09OUrw7ZtPqa8jFKv113HuLm5IYbXVFXdcRPl9vaWGH5GaTQaU8fI5/PE8JumafvNZvO/MQqFAjFmJRqNHk6Ksqgx5vr1zzAM2d7edr3/6uqqsra2NnZbp9NR+v2+62OHQqG5zObXPIMEAgFlfX3dl2N79btl1viTA0FAEIKAIAQBAAAAAAAAsMz+Ai1bUgo6ebm8AAAAAElFTkSuQmCC');
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endpush

@push('js')
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center  : new google.maps.LatLng(0, 0),
                zoom    : 2
            });
        }

        function loadGeoJsonString(geoString) {
            var geojson = JSON.parse(geoString);

            map.data.addGeoJson(geojson);
            zoom(map);
        }

        function zoom(map) {
            var bounds = new google.maps.LatLngBounds();

            map.data.forEach(function(feature) {
                processPoints(feature.getGeometry(), bounds.extend, bounds);
            });

            map.fitBounds(bounds);
        }

        function processPoints(geometry, callback, thisArg) {
            if (geometry instanceof google.maps.LatLng) {
                callback.call(thisArg, geometry);
            } else if (geometry instanceof google.maps.Data.Point) {
                callback.call(thisArg, geometry.get());
            } else {
                geometry.getArray().forEach(function(g) {
                    processPoints(g, callback, thisArg);
                });
            }
        }

        function initEvents() {
            var mapContainer = document.getElementById('map');
            var dropContainer = document.getElementById('drop-container');

            mapContainer.addEventListener('dragenter', showPanel, false);

            dropContainer.addEventListener('dragover', showPanel, false);
            dropContainer.addEventListener('drop', handleDrop, false);
            dropContainer.addEventListener('dragleave', hidePanel, false);
        }

        function showPanel(e) {
            e.stopPropagation();
            e.preventDefault();

            document.getElementById('drop-container').style.display = 'block';

            return false;
        }

        function hidePanel(e) {
            document.getElementById('drop-container').style.display = 'none';
        }

        function handleDrop(e) {
            e.preventDefault();
            e.stopPropagation();

            hidePanel(e);

            var files = e.dataTransfer.files;

            if (files.length) {
                for (var i = 0, file; file = files[i]; i++) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        loadGeoJsonString(e.target.result);
                    };

                    reader.onerror = function(e) {
                        console.error('reading failed');
                    };

                    reader.readAsText(file);
                }
            }
            else {
                var plainText = e.dataTransfer.getData('text/plain');

                if (plainText) {
                    loadGeoJsonString(plainText);
                }
            }

            return false;
        }


        function initialize() {
            initMap();
            initEvents();
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initialize"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var map;

        function initMap() {
            // set up the map
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center  : new google.maps.LatLng(0, 0),
                zoom    : 2
            });
        }

        function loadGeoJsonString(geoString) {
            var geojson = JSON.parse(geoString);

            map.data.addGeoJson(geojson);
            zoom(map);
        }

        /**
        * Update a map&apos;s viewport to fit each geometry in a dataset
        * @param {google.maps.Map} map The map to adjust
        */
        function zoom(map) {
            var bounds = new google.maps.LatLngBounds();

            map.data.forEach(function(feature) {
                processPoints(feature.getGeometry(), bounds.extend, bounds);
            });

            map.fitBounds(bounds);
        }

        /**
        * Process each point in a Geometry, regardless of how deep the points may lie.
        * @param {google.maps.Data.Geometry} geometry The structure to process
        * @param {function(google.maps.LatLng)} callback A function to call on each
        *     LatLng point encountered (e.g. Array.push)
        * @param {Object} thisArg The value of &apos;this&apos; as provided to &apos;callback&apos; (e.g.
        *     myArray)
        */
        function processPoints(geometry, callback, thisArg) {
            if (geometry instanceof google.maps.LatLng) {
                callback.call(thisArg, geometry);
            } else if (geometry instanceof google.maps.Data.Point) {
                callback.call(thisArg, geometry.get());
            } else {
                geometry.getArray().forEach(function(g) {
                    processPoints(g, callback, thisArg);
                });
            }
        }

        /* DOM (drag/drop) functions */
        function initEvents() {
            // set up the drag &amp; drop events
            var mapContainer = document.getElementById(&apos;map&apos;);
            var dropContainer = document.getElementById(&apos;drop-container&apos;);

            // map-specific events
            mapContainer.addEventListener(&apos;dragenter&apos;, showPanel, false);

            // overlay specific events (since it only appears once drag starts)
            dropContainer.addEventListener(&apos;dragover&apos;, showPanel, false);
            dropContainer.addEventListener(&apos;drop&apos;, handleDrop, false);
            dropContainer.addEventListener(&apos;dragleave&apos;, hidePanel, false);
        }

        function showPanel(e) {
            e.stopPropagation();
            e.preventDefault();

            document.getElementById(&apos;drop-container&apos;).style.display = &apos;block&apos;;

            return false;
        }

        function hidePanel(e) {
            document.getElementById(&apos;drop-container&apos;).style.display = &apos;none&apos;;
        }

        function handleDrop(e) {
            e.preventDefault();
            e.stopPropagation();

            hidePanel(e);

            var files = e.dataTransfer.files;

            if (files.length) {
                // process file(s) being dropped
                // grab the file data from each file
                for (var i = 0, file; file = files[i]; i++) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        loadGeoJsonString(e.target.result);
                    };

                    reader.onerror = function(e) {
                        console.error(&apos;reading failed&apos;);
                    };

                    reader.readAsText(file);
                }
            }
            else {
                // process non-file (e.g. text or html) content being dropped
                // grab the plain text version of the data
                var plainText = e.dataTransfer.getData(&apos;text/plain&apos;);

                if (plainText) {
                    loadGeoJsonString(plainText);
                }
            }

            // prevent drag event from bubbling further
            return false;
        }


        function initialize() {
            initMap();
            initEvents();
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initialize&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    
    #map { height: 500px; }

    #drop-container {
        display: none;
        height: 100%;
        width: 100%;
        position: absolute;
        z-index: 1;
        top: 0px;
        left: 0px;
        padding: 20px;
        background-color: rgba(100, 100, 100, 0.5);
    }

    #drop-silhouette {
        color: white;
        border: white dashed 8px;
        height: calc(100% - 56px);
        width: calc(100% - 56px);
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAAZiS0dEAGQAZABkkPCsTwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB90LHAIvICWdsKwAAAAZdEVYdENvbW1lbnQAQ3JlYXRlZCB3aXRoIEdJTVBXgQ4XAAACdklEQVR42u3csU7icBzA8Xp3GBMSeRITH8JHMY7cRMvmVmXoE9TAcJubhjD4ApoiopgqDMWAKAgIcSAiCfxuwhwROVJbkPD9rP23ob8vpZCQKgoAAAAAAAAAAPDYyiK/eNM05bNtr6+vSjgcXiHxDMkE1WpVFvGcfpCVICAIQUAQgoAgBAFBCAKCgCAEAUEIAoIQBAQhCAgCghAEBCEICEIQEIQgIAgIQhAQhCAgCEFAEIKAICAIQUAQgoAgBAFBCDIzhmFINBo9/K6D0XVddnd3ZaneDY7jSCqVcn3SfjyeKRKJbJ2dnYllWbKUl2i5XJaXlxdJJBIy7yDHx8fy9vYm6XR6OWMM3d/fi4hIqVSSWCwmsw5ycHAgrVZLRETOz8+XO8ZQpVJ5H2Y6nRZN0/b9DqLruhSLxfd9MpkMMT6L0uv1JJlMih9BhveJwWDwvv7i4oIY4zw8PIwMtt1uSzweF6+CHB0dSbfbHVmbzWaJMcnj4+OHAd/d3cne3p64DWKapjw/P39Yd3l5SYxpVKvVsYO2LEtUVd2ZNoiu6+I4ztg1V1dXxPAiSq/Xk5OTk0k9pNVqyenp6ch94l+5XI4YbtRqNfHa9fX1t43xcwGa/Nnc3PwdDAY9OZht28rGxgZPvP6KSCSy9fT09OUrw7ZtPqa8jFKv113HuLm5IYbXVFXdcRPl9vaWGH5GaTQaU8fI5/PE8JumafvNZvO/MQqFAjFmJRqNHk6Ksqgx5vr1zzAM2d7edr3/6uqqsra2NnZbp9NR+v2+62OHQqG5zObXPIMEAgFlfX3dl2N79btl1viTA0FAEIKAIAQBAAAAAAAAsMz+Ai1bUgo6ebm8AAAAAElFTkSuQmCC');
        background-repeat: no-repeat;
        background-position: center;
    }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
