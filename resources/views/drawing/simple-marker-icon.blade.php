@extends('layouts.app')

@section('title', 'Simple marker icon')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Simple marker icon
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
                zoom    : 6,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

            var beachMarker = new google.maps.Marker({
                position    : {lat: -7.265757, lng: 112.734146},
                map         : map,
                icon        : image
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
