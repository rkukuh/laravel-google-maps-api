@extends('layouts.app')

@section('title', 'Marker animation with setTimeout()')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Marker animation with setTimeout()
    </h1>

    <div id="floating-panel">
        <button id="drop" onclick="drop()">Drop Markers</button>
    </div>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 60%;
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
        var neighborhoods = [
            {lat: 52.511, lng: 13.447},
            {lat: 52.549, lng: 13.422},
            {lat: 52.497, lng: 13.396},
            {lat: 52.517, lng: 13.394}
        ];

        var markers = [];
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 12,
                center  : {lat: 52.520, lng: 13.410}
            });
        }

        function drop() {
            clearMarkers();

            for (var i = 0; i < neighborhoods.length; i++) {
                addMarkerWithTimeout(neighborhoods[i], i * 200);
            }
        }

        function addMarkerWithTimeout(position, timeout) {
            window.setTimeout(function() {
                markers.push(new google.maps.Marker({
                    position    : position,
                    map         : map,
                    animation   : google.maps.Animation.DROP
                }));
            },
            timeout);
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }

            markers = [];
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // If you&apos;re adding a number of markers, you may want to drop them on the map
        // consecutively rather than all at once. This example shows how to use
        // window.setTimeout() to space your markers&apos; animation.

        var neighborhoods = [
            {lat: 52.511, lng: 13.447},
            {lat: 52.549, lng: 13.422},
            {lat: 52.497, lng: 13.396},
            {lat: 52.517, lng: 13.394}
        ];

        var markers = [];
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 12,
                center  : {lat: 52.520, lng: 13.410}
            });
        }

        function drop() {
            clearMarkers();

            for (var i = 0; i &lt; neighborhoods.length; i++) {
                addMarkerWithTimeout(neighborhoods[i], i * 200);
            }
        }

        function addMarkerWithTimeout(position, timeout) {
            window.setTimeout(function() {
                markers.push(new google.maps.Marker({
                    position    : position,
                    map         : map,
                    animation   : google.maps.Animation.DROP
                }));
            },
            timeout);
        }

        function clearMarkers() {
            for (var i = 0; i &lt; markers.length; i++) {
                markers[i].setMap(null);
            }

            markers = [];
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
        left: 60%;
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

    &lt;div id=&quot;floating-panel&quot;&gt;
        &lt;button id=&quot;drop&quot; onclick=&quot;drop()&quot;&gt;Drop Markers&lt;/button&gt;
    &lt;/div&gt;

    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;
@endsection
