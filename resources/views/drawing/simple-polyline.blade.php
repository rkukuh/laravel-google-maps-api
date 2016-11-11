@extends('layouts.app')

@section('title', 'Simple polyline')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Simple polyline
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
        // This example creates a 2-pixel-wide red polyline showing the path of William
        // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
        // Brisbane, Australia.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 3,
                center      : {lat: 0, lng: -180},
                mapTypeId   : 'terrain'
            });

            var flightPlanCoordinates = [
                {lat: 37.772, lng: -122.214},
                {lat: 21.291, lng: -157.821},
                {lat: -18.142, lng: 178.431},
                {lat: -27.467, lng: 153.027}
            ];

            var flightPath = new google.maps.Polyline({
                path            : flightPlanCoordinates,
                geodesic        : true,
                strokeColor     : '#FF0000',
                strokeOpacity   : 1.0,
                strokeWeight    : 2
            });

            flightPath.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
