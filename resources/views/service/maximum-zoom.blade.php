@extends('layouts.app')

@section('title', 'Maximum zoom imagery')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Maximum zoom imagery
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
        var map;
        var maxZoomService;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {lat: 35.6894, lng: 139.692},
                mapTypeId: 'hybrid'
            });

            infoWindow      = new google.maps.InfoWindow();
            maxZoomService  = new google.maps.MaxZoomService();

            map.addListener('click', showMaxZoom);
        }

        function showMaxZoom(e) {
            maxZoomService.getMaxZoomAtLatLng(e.latLng, function(response) {
                if (response.status !== 'OK') {
                    infoWindow.setContent('Error in MaxZoomService');
                } else {
                    infoWindow.setContent('The maximum zoom at this location is: ' + response.zoom);
                }

                infoWindow.setPosition(e.latLng);
                infoWindow.open(map);
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
