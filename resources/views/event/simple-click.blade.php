@extends('layouts.app')

@section('title', 'Simple click event')

@section('content')
    <h1>Simple click event</h1>

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
            var myLatlng = {lat: -25.363, lng: 131.044};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: myLatlng
            });

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Click to zoom'
            });

            map.addListener('center_changed', function() {
                // 3 seconds after the center of the map has changed, pan back to the marker.
                window.setTimeout(function() {
                    map.panTo(marker.getPosition());
                }, 3000);
            });

            marker.addListener('click', function() {
                map.setZoom(8);
                map.setCenter(marker.getPosition());
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
