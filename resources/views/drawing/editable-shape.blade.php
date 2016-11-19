@extends('layouts.app')

@section('title', 'User-editable shape')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        User-editable shape
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
                center  : {lat: 44.5452, lng: -78.5389},
                zoom    : 9
            });

            var bounds = {
                north: 44.599,
                south: 44.490,
                east: -78.443,
                west: -78.649
            };

            var rectangle = new google.maps.Rectangle({
                bounds: bounds,
                editable: true
            });

            rectangle.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
