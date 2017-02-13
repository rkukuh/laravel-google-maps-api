@extends('layouts.app')

@section('title', 'Elevation service')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Elevation service
    </h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 8,
                center      : {lat: 63.333, lng: -150.5},  // Denali.
                mapTypeId   : 'terrain'
            });

            var elevator    = new google.maps.ElevationService;
            var infowindow  = new google.maps.InfoWindow({map: map});

            map.addListener('click', function(event) {
                displayLocationElevation(event.latLng, elevator, infowindow);
            });
        }

        function displayLocationElevation(location, elevator, infowindow) {
            elevator.getElevationForLocations({
                'locations': [location]
            },
            function(results, status) {
                infowindow.setPosition(location);

                if (status === 'OK') {
                    if (results[0]) {
                        infowindow.setContent('The elevation at this point <br>is ' + results[0].elevation + ' meters.');
                    }
                    else {
                        infowindow.setContent('No results found');
                    }
                }
                else {
                    infowindow.setContent('Elevation service failed due to: ' + status);
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 8,
                center      : {lat: 63.333, lng: -150.5},  // Denali.
                mapTypeId   : &apos;terrain&apos;
            });

            var elevator    = new google.maps.ElevationService;
            var infowindow  = new google.maps.InfoWindow({map: map});

            map.addListener(&apos;click&apos;, function(event) {
                displayLocationElevation(event.latLng, elevator, infowindow);
            });
        }

        function displayLocationElevation(location, elevator, infowindow) {
            elevator.getElevationForLocations({
                &apos;locations&apos;: [location]
            },
            function(results, status) {
                infowindow.setPosition(location);

                if (status === &apos;OK&apos;) {
                    if (results[0]) {
                        infowindow.setContent(&apos;The elevation at this point &lt;br&gt;is &apos; + results[0].elevation + &apos; meters.&apos;);
                    }
                    else {
                        infowindow.setContent(&apos;No results found&apos;);
                    }
                }
                else {
                    infowindow.setContent(&apos;Elevation service failed due to: &apos; + status);
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
