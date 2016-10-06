@extends('layouts.app')

@section('title', 'Street View controls')

@section('content')
    <h1>Street View controls</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        function initPano() {
            // Note: constructed panorama objects have visible: true
            // set by default.
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('map'), {
                    position: {lat: 42.345573, lng: -71.098326},
                    addressControlOptions: {
                        position: google.maps.ControlPosition.BOTTOM_CENTER
                    },
                    linksControl: false,
                    panControl: false,
                    enableCloseButton: false
                }
            );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initPano"></script>
@endpush
