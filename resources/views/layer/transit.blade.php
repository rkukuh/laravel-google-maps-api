@extends('layouts.app')

@section('title', 'Transit layer')

@section('content')
    <h1>Transit layer</h1>

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
                zoom    : 13,
                center  : {lat: 51.501904, lng: -0.115871}
            });

            var transitLayer = new google.maps.TransitLayer();

            transitLayer.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush