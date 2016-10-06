@extends('layouts.app')

@section('title', 'Draggable direction')

@section('content')
    <h1>Draggable direction</h1>

    <div id="map"></div>

    <div id="right-panel">
        <p>Total Distance: <span id="total"></span></p>
    </div>
@endsection

@push('css')
    <style>
        #map {
            float: left;
            width: 63%;
            height: 500px;
        }

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            float: right;
            width: 34%;
            height: 500px;
            overflow: scroll
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

        .panel {
            height: 100%;
            overflow: auto;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 4,
                center  : {lat: -24.345, lng: 134.46}  // Australia.
            });

            var directionsService = new google.maps.DirectionsService;

            var directionsDisplay = new google.maps.DirectionsRenderer({
                draggable   : true,
                map         : map,
                panel       : document.getElementById('right-panel')
            });

            directionsDisplay.addListener('directions_changed', function() {
                computeTotalDistance(directionsDisplay.getDirections());
            });

            displayRoute(
                'Perth, WA',
                'Sydney, NSW',
                directionsService,
                directionsDisplay
            );
        }

        function displayRoute(origin, destination, service, display) {
            service.route({
                origin      : origin,
                destination : destination,
                waypoints   : [
                    {location: 'Adelaide, SA'},
                    {location: 'Broken Hill, NSW'}
                ],
                travelMode  : 'DRIVING',
                avoidTolls  : true
            },
            function(response, status) {
                if (status === 'OK') {
                    display.setDirections(response);
                }
                else {
                    alert('Could not display directions due to: ' + status);
                }
            });
        }

        function computeTotalDistance(result) {
            var total   = 0;
            var myroute = result.routes[0];

            for (var i = 0; i < myroute.legs.length; i++) {
                total += myroute.legs[i].distance.value;
            }

            total = total / 1000;

            document.getElementById('total').innerHTML = total + ' km';
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush