@extends('layouts.app')

@section('title', 'Draggable polygons')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Draggable polygons
    </h1>

    <span><small class="text-primary">
        The red triangle is geodesic, so its shape changes as you drag it north or south.
    </small></span>

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
            zoom        : 1,
            center      : {lat: 24.886, lng: -70.268},
            mapTypeId   : 'terrain'
        });

        var blueCoords = [
            {lat: 25.774, lng: -60.190},
            {lat: 18.466, lng: -46.118},
            {lat: 32.321, lng: -44.757}
        ];

        var redCoords = [
            {lat: 25.774, lng: -80.190},
            {lat: 18.466, lng: -66.118},
            {lat: 32.321, lng: -64.757}
        ];

        new google.maps.Polygon({
            map             : map,
            paths           : redCoords,
            strokeColor     : '#FF0000',
            strokeOpacity   : 0.8,
            strokeWeight    : 2,
            fillColor       : '#FF0000',
            fillOpacity     : 0.35,
            draggable       : true,
            geodesic        : true
        });

        new google.maps.Polygon({
            map             : map,
            paths           : blueCoords,
            strokeColor     : '#0000FF',
            strokeOpacity   : 0.8,
            strokeWeight    : 2,
            fillColor       : '#0000FF',
            fillOpacity     : 0.35,
            draggable       : true,
            geodesic        : false
        });
    }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 1,
                center      : {lat: 24.886, lng: -70.268},
                mapTypeId   : &apos;terrain&apos;
            });

            var blueCoords = [
                {lat: 25.774, lng: -60.190},
                {lat: 18.466, lng: -46.118},
                {lat: 32.321, lng: -44.757}
            ];

            var redCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            new google.maps.Polygon({
                map             : map,
                paths           : redCoords,
                strokeColor     : &apos;#FF0000&apos;,
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : &apos;#FF0000&apos;,
                fillOpacity     : 0.35,
                draggable       : true,
                geodesic        : true
            });

            new google.maps.Polygon({
                map             : map,
                paths           : blueCoords,
                strokeColor     : &apos;#0000FF&apos;,
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : &apos;#0000FF&apos;,
                fillOpacity     : 0.35,
                draggable       : true,
                geodesic        : false
            });
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
