@extends('layouts.app')

@section('title', 'Simple polygons')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Simple polygons
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
                zoom        : 5,
                center      : {lat: 24.886, lng: -70.268},
                mapTypeId   : 'terrain'
            });

            var triangleCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757},
                {lat: 25.774, lng: -80.190}
            ];

            // Construct the polygon.
            var bermudaTriangle = new google.maps.Polygon({
                paths           : triangleCoords,
                strokeColor     : '#FF0000',
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : '#FF0000',
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
                zoom        : 5,
                center      : {lat: 24.886, lng: -70.268},
                mapTypeId   : &apos;terrain&apos;
            });

            var triangleCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757},
                {lat: 25.774, lng: -80.190}
            ];

            // Construct the polygon.
            var bermudaTriangle = new google.maps.Polygon({
                paths           : triangleCoords,
                strokeColor     : &apos;#FF0000&apos;,
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : &apos;#FF0000&apos;,
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
