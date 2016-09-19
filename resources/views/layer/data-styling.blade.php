@extends('layouts.app')

@section('title', 'Data Layer: Styling')

@section('content')
    <h1>Data Layer: Styling</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 4,
                center  : {lat: -28, lng: 137}
            });

            map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');

            map.data.setStyle({
                fillColor    : 'red',
                strokeWeight : 2
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
