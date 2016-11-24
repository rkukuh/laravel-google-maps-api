@extends('layouts.app')

@section('title', '45&deg; imagery')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        45&deg; imagery
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
                center      : {lat: 36.964, lng: -122.015},
                zoom        : 18,
                mapTypeId   : 'satellite'
            });

            map.setTilt(45);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
