@extends('layouts.app')

@section('title', 'Custom marker icon')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom marker icon
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
                zoom    : 8,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            var goldStar = {
                path        : 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
                fillColor   : 'yellow',
                fillOpacity : 0.8,
                scale       : 1,
                strokeColor : 'gold',
                strokeWeight: 10
            };

            var marker = new google.maps.Marker({
                position    : map.getCenter(),
                icon        : goldStar,
                map         : map
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
