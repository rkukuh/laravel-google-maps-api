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

@section('source-code-javascript')

    &lt;script&gt;
        // This example creates a 2-pixel-wide red polyline showing the path of William
        // Kingsford Smith&apos;s first trans-Pacific flight between Oakland, CA, and
        // Brisbane, Australia.

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 3,
                center      : {lat: 0, lng: -180},
                mapTypeId   : &apos;terrain&apos;
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
                strokeColor     : &apos;#FF0000&apos;,
                strokeOpacity   : 1.0,
                strokeWeight    : 2
            });

            flightPath.setMap(map);
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
