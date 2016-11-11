@extends('layouts.app')

@section('title', 'Removing polyline')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Removing polyline
    </h1>

    <div id="floating-panel">
        <input onclick="removeLine();" type=button value="Remove line">
        <input onclick="addLine();" type=button value="Restore line">
    </div>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 35%;
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
        var flightPath;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 3,
                center      : {lat: 0, lng: -180},
                mapTypeId   : 'terrain'
            });

            var flightPathCoordinates = [
                {lat: 37.772, lng: -122.214},
                {lat: 21.291, lng: -157.821},
                {lat: -18.142, lng: 178.431},
                {lat: -27.467, lng: 153.027}
            ];

            flightPath = new google.maps.Polyline({
                path            : flightPathCoordinates,
                strokeColor     : '#FF0000',
                strokeOpacity   : 1.0,
                strokeWeight    : 2
            });

            addLine();
        }

        function addLine() {
            flightPath.setMap(map);
        }

        function removeLine() {
            flightPath.setMap(null);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example adds a UI control allowing users to remove the polyline from the
        // map.

        var flightPath;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 3,
                center      : {lat: 0, lng: -180},
                mapTypeId   : &apos;terrain&apos;
            });

            var flightPathCoordinates = [
                {lat: 37.772, lng: -122.214},
                {lat: 21.291, lng: -157.821},
                {lat: -18.142, lng: 178.431},
                {lat: -27.467, lng: 153.027}
            ];

            flightPath = new google.maps.Polyline({
                path            : flightPathCoordinates,
                strokeColor     : &apos;#FF0000&apos;,
                strokeOpacity   : 1.0,
                strokeWeight    : 2
            });

            addLine();
        }

        function addLine() {
            flightPath.setMap(map);
        }

        function removeLine() {
            flightPath.setMap(null);
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map { height: 500px; }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 35%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
@endsection

@section('source-code-html')

    <div id="floating-panel">
        <input onclick="removeLine();" type=button value="Remove line">
        <input onclick="addLine();" type=button value="Restore line">
    </div>

    <div id="map"></div>
@endsection
