@extends('layouts.app')

@section('title', 'Direction with setPanel()')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Direction with setPanel()
    </h1>

    <div id="floating-panel">
        <strong>Start:</strong>
        <select id="start">
            <option value="chicago, il">Chicago</option>
            <option value="st louis, mo">St Louis</option>
            <option value="joplin, mo">Joplin, MO</option>
            <option value="oklahoma city, ok">Oklahoma City</option>
            <option value="amarillo, tx">Amarillo</option>
            <option value="gallup, nm">Gallup, NM</option>
            <option value="flagstaff, az">Flagstaff, AZ</option>
            <option value="winona, az">Winona</option>
            <option value="kingman, az">Kingman</option>
            <option value="barstow, ca">Barstow</option>
            <option value="san bernardino, ca">San Bernardino</option>
            <option value="los angeles, ca">Los Angeles</option>
        </select>
        <br>
        <strong>End:</strong>
        <select id="end">
            <option value="chicago, il">Chicago</option>
            <option value="st louis, mo">St Louis</option>
            <option value="joplin, mo">Joplin, MO</option>
            <option value="oklahoma city, ok">Oklahoma City</option>
            <option value="amarillo, tx">Amarillo</option>
            <option value="gallup, nm">Gallup, NM</option>
            <option value="flagstaff, az">Flagstaff, AZ</option>
            <option value="winona, az">Winona</option>
            <option value="kingman, az">Kingman</option>
            <option value="barstow, ca">Barstow</option>
            <option value="san bernardino, ca">San Bernardino</option>
            <option value="los angeles, ca">Los Angeles</option>
        </select>
    </div>

    <div id="right-panel"></div>
    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 35%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            background: #fff;
            font-size: 14px;
            box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
            display: none;
        }

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            height: 500px;
            float: right;
            width: 390px;
            overflow: scroll;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        #map {
            margin-right: 400px;
        }

        @media print {
            #map {
                height: 500px;
                margin: 0;
            }

            #right-panel {
                float: none;
                width: auto;
            }
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 7,
                center  : {lat: 41.85, lng: -87.65}
            });

            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('right-panel'));

            var control = document.getElementById('floating-panel');

            control.style.display = 'block';
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };

            document.getElementById('start').addEventListener('change', onChangeHandler);
            document.getElementById('end').addEventListener('change', onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var start   = document.getElementById('start').value;
            var end     = document.getElementById('end').value;

            directionsService.route({
                origin      : start,
                destination : end,
                travelMode  : 'DRIVING'
            },
            function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                }
                else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 7,
                center  : {lat: 41.85, lng: -87.65}
            });

            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById(&apos;right-panel&apos;));

            var control = document.getElementById(&apos;floating-panel&apos;);

            control.style.display = &apos;block&apos;;
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };

            document.getElementById(&apos;start&apos;).addEventListener(&apos;change&apos;, onChangeHandler);
            document.getElementById(&apos;end&apos;).addEventListener(&apos;change&apos;, onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var start   = document.getElementById(&apos;start&apos;).value;
            var end     = document.getElementById(&apos;end&apos;).value;

            directionsService.route({
                origin      : start,
                destination : end,
                travelMode  : &apos;DRIVING&apos;
            },
            function(response, status) {
                if (status === &apos;OK&apos;) {
                    directionsDisplay.setDirections(response);
                }
                else {
                    window.alert(&apos;Directions request failed due to &apos; + status);
                }
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $server_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
