@extends('layouts.app')

@section('title', 'Travel Modes in direction')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Travel Modes in direction
    </h1>

    <div id="map"></div>

    <div id="floating-panel">
        <b>Mode of Travel: </b>
        <select id="mode">
            <option value="DRIVING">Driving</option>
            <option value="WALKING">Walking</option>
            <option value="BICYCLING">Bicycling</option>
            <option value="TRANSIT">Transit</option>
        </select>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 45%;
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
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var directionsService = new google.maps.DirectionsService;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 14,
                center  : {lat: 37.77, lng: -122.447}
            });

            directionsDisplay.setMap(map);

            calculateAndDisplayRoute(directionsService, directionsDisplay);

            document.getElementById('mode').addEventListener('change', function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var selectedMode = document.getElementById('mode').value;

            directionsService.route({
                origin      : {lat: 37.77, lng: -122.447},
                destination : {lat: 37.768, lng: -122.511},
                travelMode  : google.maps.TravelMode[selectedMode]
            },
            function(response, status) {
                if (status == 'OK') {
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
                zoom    : 14,
                center  : {lat: 37.77, lng: -122.447}
            });

            directionsDisplay.setMap(map);

            calculateAndDisplayRoute(directionsService, directionsDisplay);

            document.getElementById(&apos;mode&apos;).addEventListener(&apos;change&apos;, function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var selectedMode = document.getElementById(&apos;mode&apos;).value;

            directionsService.route({
                origin      : {lat: 37.77, lng: -122.447},  // Haight.
                destination : {lat: 37.768, lng: -122.511},  // Ocean Beach.
                // Note that Javascript allows us to access the constant
                // using square brackets and a string value as its
                // &quot;property.&quot;
                travelMode  : google.maps.TravelMode[selectedMode]
            },
            function(response, status) {
                if (status == &apos;OK&apos;) {
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
