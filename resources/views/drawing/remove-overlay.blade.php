@extends('layouts.app')

@section('title', 'Removing overlay')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Removing overlay
    </h1>

    <div id="floating-panel">
        <input onclick="removeOverlay();" type=button value="Remove overlay">
        <input onclick="addOverlay();" type=button value="Restore overlay">
    </div>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position        : absolute;
            top             : 10px;
            left            : 35%;
            z-index         : 5;
            background-color: #fff;
            padding         : 5px;
            border          : 1px solid #999;
            text-align      : center;
            font-family     : 'Roboto','sans-serif';
            line-height     : 30px;
            padding-left    : 10px;
      }
    </style>
@endpush

@push('js')
    <script>
        var historicalOverlay;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 13,
                center  : {lat: 40.740, lng: -74.18}
            });

            var imageBounds = {
                north: 40.773941,
                south: 40.712216,
                east: -74.12544,
                west: -74.22655
            };

            historicalOverlay = new google.maps.GroundOverlay(
                'https://www.lib.utexas.edu/maps/historical/newark_nj_1922.jpg',
                imageBounds
            );

            addOverlay();
        }

        function addOverlay() {
            historicalOverlay.setMap(map);
        }

        function removeOverlay() {
            historicalOverlay.setMap(null);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
