@extends('layouts.app')

@section('title', 'Getting properties with event handlers')

@section('content')
    <h1>Getting properties with event handlers</h1>

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
            var originalMapCenter = new google.maps.LatLng(-25.363882, 131.044922);

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: originalMapCenter
            });

            var infowindow = new google.maps.InfoWindow({
                content: 'Change the zoom level',
                position: originalMapCenter
            });

            infowindow.open(map);

            map.addListener('zoom_changed', function() {
                infowindow.setContent('Zoom: ' + map.getZoom());
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
