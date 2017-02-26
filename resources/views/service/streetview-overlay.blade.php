@extends('layouts.app')

@section('title', 'Overlays within street view')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Overlays within street view
    </h1>

    <div id="map"></div>

    <div id="floating-panel">
        <input type="button" value="Toggle Street View" onclick="toggleStreetView();"></input>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 45%;
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
        var panorama;

        function initMap() {
            var astorPlace = {lat: 40.729884, lng: -73.990988};

            var map = new google.maps.Map(document.getElementById('map'), {
                center  : astorPlace,
                zoom    : 18,
                streetViewControl: false
            });

            var cafeMarker = new google.maps.Marker({
                position    : {lat: 40.730031, lng: -73.991428},
                map         : map,
                icon        : 'http://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=cafe|FFFF00',
                title       : 'Cafe'
            });

            var bankMarker = new google.maps.Marker({
                position    : {lat: 40.729681, lng: -73.991138},
                map         : map,
                icon        : 'http://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=dollar|FFFF00',
                title       : 'Bank'
            });

            var busMarker = new google.maps.Marker({
                position    : {lat: 40.729559, lng: -73.990741},
                map         : map,
                icon        : 'http://chart.apis.google.com/chart?chst=d_map_pin_icon&chld=bus|FFFF00',
                title       : 'Bus Stop'
            });

            panorama = map.getStreetView();

            panorama.setPosition(astorPlace);
            panorama.setPov(/** @type {google.maps.StreetViewPov} */({
                heading : 265,
                pitch   : 0
            }));
        }

        function toggleStreetView() {
            var toggle = panorama.getVisible();

            if (toggle == false) {
                panorama.setVisible(true);
            } else {
                panorama.setVisible(false);
            }
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var panorama;

        function initMap() {
            var astorPlace = {lat: 40.729884, lng: -73.990988};

            // Set up the map
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center  : astorPlace,
                zoom    : 18,
                streetViewControl: false
            });

            // Set up the markers on the map
            var cafeMarker = new google.maps.Marker({
                position    : {lat: 40.730031, lng: -73.991428},
                map         : map,
                icon        : &apos;http://chart.apis.google.com/chart?chst=d_map_pin_icon&amp;chld=cafe|FFFF00&apos;,
                title       : &apos;Cafe&apos;
            });

            var bankMarker = new google.maps.Marker({
                position    : {lat: 40.729681, lng: -73.991138},
                map         : map,
                icon        : &apos;http://chart.apis.google.com/chart?chst=d_map_pin_icon&amp;chld=dollar|FFFF00&apos;,
                title       : &apos;Bank&apos;
            });

            var busMarker = new google.maps.Marker({
                position    : {lat: 40.729559, lng: -73.990741},
                map         : map,
                icon        : &apos;http://chart.apis.google.com/chart?chst=d_map_pin_icon&amp;chld=bus|FFFF00&apos;,
                title       : &apos;Bus Stop&apos;
            });

            // We get the map&apos;s default panorama and set up some defaults.
            // Note that we don&apos;t yet set it visible.
            panorama = map.getStreetView();

            panorama.setPosition(astorPlace);
            panorama.setPov(/** @type {google.maps.StreetViewPov} */({
                heading : 265,
                pitch   : 0
            }));
        }

        function toggleStreetView() {
            var toggle = panorama.getVisible();

            if (toggle == false) {
                panorama.setVisible(true);
            } else {
                panorama.setVisible(false);
            }
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map { height: 500px; }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 45%;
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
    <div id="map"></div>
@endsection
