@extends('layouts.app')

@section('title', 'Elevation service')

@section('content')
    <h1>Elevation service</h1>

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
