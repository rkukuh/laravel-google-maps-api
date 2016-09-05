@extends('layouts.app')

@section('title', 'Listening to DOM events')

@section('content')
    <h1>Listening to DOM events</h1>

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
            var mapDiv = document.getElementById('map');

            var map = new google.maps.Map(mapDiv, {
                zoom: 8,
                center: new google.maps.LatLng(-34.397, 150.644)
            });

            // We add a DOM event here to show an alert if the DIV containing the
            // map is clicked.
            google.maps.event.addDomListener(mapDiv, 'click', function() {
                window.alert('Map was clicked!');
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
