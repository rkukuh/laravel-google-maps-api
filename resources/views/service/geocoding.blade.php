@extends('layouts.app')

@section('title', 'Geocoding')

@section('content')
    <h1>Geocoding</h1>

    <div id="floating-panel">
        <input id="address" type="textbox" value="Surabaya, Indonesia">
        <input id="submit" type="button" value="Geocode">
    </div>

    <span class="text-primary">Use "Server Key" instead of "Browser Key"</span>
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
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 8,
                center  : {lat: -34.397, lng: 150.644}
            });

            var geocoder = new google.maps.Geocoder();

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;

            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);

                    var marker = new google.maps.Marker({
                        map     : resultsMap,
                        position: results[0].geometry.location
                    });
                }
                else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush
