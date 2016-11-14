@extends('layouts.app')

@section('title', 'Polygon with hole')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Polygon with hole
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
                zoom    : 5,
                center  : {lat: 24.886, lng: -70.268},
            });

            var outerCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            var innerCoords = [
                {lat: 28.745, lng: -70.579},
                {lat: 29.570, lng: -67.514},
                {lat: 27.339, lng: -66.668}
            ];

            var bermudaTriangle = new google.maps.Polygon({
                paths           : [outerCoords, innerCoords],
                strokeColor     : '#FFC107',
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : '#FFC107',
                fillOpacity     : 0.35
            });

            bermudaTriangle.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 5,
                center  : {lat: 24.886, lng: -70.268},
            });

            // Define the LatLng coordinates for the polygon&apos;s  outer path.
            var outerCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            // Define the LatLng coordinates for the polygon&apos;s inner path.
            // Note that the points forming the inner path are wound in the
            // opposite direction to those in the outer path, to form the hole.
            var innerCoords = [
                {lat: 28.745, lng: -70.579},
                {lat: 29.570, lng: -67.514},
                {lat: 27.339, lng: -66.668}
            ];

            // Construct the polygon, including both paths.
            var bermudaTriangle = new google.maps.Polygon({
                paths           : [outerCoords, innerCoords],
                strokeColor     : &apos;#FFC107&apos;,
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : &apos;#FFC107&apos;,
                fillOpacity     : 0.35
            });

            bermudaTriangle.setMap(map);
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
