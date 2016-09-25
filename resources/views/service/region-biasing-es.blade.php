@extends('layouts.app')

@section('title', 'Region code biasing (ES)')

@section('content')
    <h1>Region code biasing (ES)</h1>

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
        var map      = new google.maps.Map(document.getElementById('map'), {zoom: 8});
        var geocoder = new google.maps.Geocoder;

        geocoder.geocode({'address': 'Toledo'}, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);

                new google.maps.Marker({
                    map     : map,
                    position: results[0].geometry.location
                });
            }
            else {
                window.alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&region=ES&callback=initMap"></script>
@endpush
