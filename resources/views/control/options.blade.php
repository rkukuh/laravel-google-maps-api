@extends('layouts.app')

@section('title', 'Control options')

@section('content')
    <h1>Control options</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
<div id="map"></div>
<script>
    // You can set control options to change the default position or style of many
    // of the map controls.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {lat: -33, lng: 151},
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                mapTypeIds: ['roadmap', 'terrain']
            }
        });
    }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
