@extends('layouts.app')

@section('title', 'Bicycling layer')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Bicycling layer
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
                zoom    : 14,
                center  : {lat: 42.3726399, lng: -71.1096528}
            });

            var bikeLayer = new google.maps.BicyclingLayer();

            bikeLayer.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
