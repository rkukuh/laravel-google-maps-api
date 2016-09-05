@extends('layouts.app')

@section('content')
    <h1>Simple Map</h1>

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
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHnXGlwf8bxR_lc_eAvvkzf7MQYTk6ccE&callback=initMap" async defer></script>
@endpush
