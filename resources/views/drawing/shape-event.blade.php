@extends('layouts.app')

@section('title', 'Rectangle (shape) event')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Rectangle (shape) event
    </h1>

    <span><small class="text-primary">
        When the user changes the bounds of the rectangle, an info window pops up displaying the new bounds.
    </small></span>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        var rectangle;
        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 9,
                center  : {lat: 44.5452, lng: -78.5389}
            });

            var bounds = {
                north: 44.599,
                south: 44.490,
                east: -78.443,
                west: -78.649
            };

            rectangle = new google.maps.Rectangle({
                bounds: bounds,
                editable: true,
                draggable: true
            });

            rectangle.setMap(map);
            rectangle.addListener('bounds_changed', showNewRect);

            infoWindow = new google.maps.InfoWindow();
        }

        function showNewRect(event) {
            var ne = rectangle.getBounds().getNorthEast();
            var sw = rectangle.getBounds().getSouthWest();

            var contentString = '<b>Rectangle moved.</b><br>' +
            'New north-east corner: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
            'New south-west corner: ' + sw.lat() + ', ' + sw.lng();

            infoWindow.setContent(contentString);
            infoWindow.setPosition(ne);
            infoWindow.open(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
