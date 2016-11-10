@extends('layouts.app')

@section('title', 'Polygon Auto-completion')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Polygon Auto-completion
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
                {lat: 32.321, lng: -64.757}
            ];

            var bermudaTriangle = new google.maps.Polygon({
                paths           : triangleCoords,
                strokeColor     : '#FF0000',
                strokeOpacity   : 0.8,
                strokeWeight    : 3,
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
        // This example creates a simple polygon representing the Bermuda Triangle. Note
        // that the code specifies only three LatLng coordinates for the polygon. The
        // API automatically draws a stroke connecting the last LatLng back to the first
        // LatLng.

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 5,
                center      : {lat: 24.886, lng: -70.268},
                mapTypeId   : &apos;terrain&apos;
            });

            // Define the LatLng coordinates for the polygon&apos;s path. Note that there&apos;s
            // no need to specify the final coordinates to complete the polygon, because
            // The Google Maps JavaScript API will automatically draw the closing side.
            var triangleCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            var bermudaTriangle = new google.maps.Polygon({
                paths           : triangleCoords,
                strokeColor     : &apos;#FF0000&apos;,
                strokeOpacity   : 0.8,
                strokeWeight    : 3,
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
