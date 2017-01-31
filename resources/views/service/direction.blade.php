@extends('layouts.app')

@section('title', 'Direction')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Direction
    </h1>

    <span class="text-primary">Use "Server Key" instead of "Browser Key"</span>
    <div id="map"></div>

    <div id="floating-panel">
        <b>Start: </b>
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

        <b>End: </b>
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
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 7,
                center  : {lat: 41.85, lng: -87.65}
            });

            directionsDisplay.setMap(map);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };

            document.getElementById('start').addEventListener('change', onChangeHandler);
            document.getElementById('end').addEventListener('change', onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin      : document.getElementById('start').value,
                destination : document.getElementById('end').value,
                travelMode  : 'DRIVING'
            }, function(response, status) {
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
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 7,
                center  : {lat: 41.85, lng: -87.65}
            });

            directionsDisplay.setMap(map);

            var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };

            document.getElementById(&apos;start&apos;).addEventListener(&apos;change&apos;, onChangeHandler);
            document.getElementById(&apos;end&apos;).addEventListener(&apos;change&apos;, onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin      : document.getElementById(&apos;start&apos;).value,
                destination : document.getElementById(&apos;end&apos;).value,
                travelMode  : &apos;DRIVING&apos;
            }, function(response, status) {
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
    }
@endsection

@section('source-code-html')

    &lt;span class=&quot;text-primary&quot;&gt;Use &quot;Server Key&quot; instead of &quot;Browser Key&quot;&lt;/span&gt;
    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;

    &lt;div id=&quot;floating-panel&quot;&gt;
        &lt;b&gt;Start: &lt;/b&gt;
        &lt;select id=&quot;start&quot;&gt;
            &lt;option value=&quot;chicago, il&quot;&gt;Chicago&lt;/option&gt;
            &lt;option value=&quot;st louis, mo&quot;&gt;St Louis&lt;/option&gt;
            &lt;option value=&quot;joplin, mo&quot;&gt;Joplin, MO&lt;/option&gt;
            &lt;option value=&quot;oklahoma city, ok&quot;&gt;Oklahoma City&lt;/option&gt;
            &lt;option value=&quot;amarillo, tx&quot;&gt;Amarillo&lt;/option&gt;
            &lt;option value=&quot;gallup, nm&quot;&gt;Gallup, NM&lt;/option&gt;
            &lt;option value=&quot;flagstaff, az&quot;&gt;Flagstaff, AZ&lt;/option&gt;
            &lt;option value=&quot;winona, az&quot;&gt;Winona&lt;/option&gt;
            &lt;option value=&quot;kingman, az&quot;&gt;Kingman&lt;/option&gt;
            &lt;option value=&quot;barstow, ca&quot;&gt;Barstow&lt;/option&gt;
            &lt;option value=&quot;san bernardino, ca&quot;&gt;San Bernardino&lt;/option&gt;
            &lt;option value=&quot;los angeles, ca&quot;&gt;Los Angeles&lt;/option&gt;
        &lt;/select&gt;

        &lt;b&gt;End: &lt;/b&gt;
        &lt;select id=&quot;end&quot;&gt;
            &lt;option value=&quot;chicago, il&quot;&gt;Chicago&lt;/option&gt;
            &lt;option value=&quot;st louis, mo&quot;&gt;St Louis&lt;/option&gt;
            &lt;option value=&quot;joplin, mo&quot;&gt;Joplin, MO&lt;/option&gt;
            &lt;option value=&quot;oklahoma city, ok&quot;&gt;Oklahoma City&lt;/option&gt;
            &lt;option value=&quot;amarillo, tx&quot;&gt;Amarillo&lt;/option&gt;
            &lt;option value=&quot;gallup, nm&quot;&gt;Gallup, NM&lt;/option&gt;
            &lt;option value=&quot;flagstaff, az&quot;&gt;Flagstaff, AZ&lt;/option&gt;
            &lt;option value=&quot;winona, az&quot;&gt;Winona&lt;/option&gt;
            &lt;option value=&quot;kingman, az&quot;&gt;Kingman&lt;/option&gt;
            &lt;option value=&quot;barstow, ca&quot;&gt;Barstow&lt;/option&gt;
            &lt;option value=&quot;san bernardino, ca&quot;&gt;San Bernardino&lt;/option&gt;
            &lt;option value=&quot;los angeles, ca&quot;&gt;Los Angeles&lt;/option&gt;
        &lt;/select&gt;
    &lt;/div&gt;
@endsection
