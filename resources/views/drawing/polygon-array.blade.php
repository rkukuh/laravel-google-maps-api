@extends('layouts.app')

@section('title', 'Polygon arrays')

@section('content')
    <h1>Polygon arrays</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        // This example creates a simple polygon representing the Bermuda Triangle.
        // When the user clicks on the polygon an info window opens, showing
        // information about the polygon's coordinates.

        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 5,
                center      : {lat: 24.886, lng: -70.268},
                mapTypeId   : 'terrain'
            });

            // Define the LatLng coordinates for the polygon.
            var triangleCoords = [
                {lat: 25.774, lng: -80.190},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            // Construct the polygon.
            var bermudaTriangle = new google.maps.Polygon({
                paths           : triangleCoords,
                strokeColor     : '#FF0000',
                strokeOpacity   : 0.8,
                strokeWeight    : 3,
                fillColor       : '#FF0000',
                fillOpacity     : 0.35
            });

            bermudaTriangle.setMap(map);

            // Add a listener for the click event.
            bermudaTriangle.addListener('click', showArrays);

            infoWindow = new google.maps.InfoWindow;
        }

        /** @this {google.maps.Polygon} */
        function showArrays(event) {
            // Since this polygon has only one path, we can call getPath() to return the
            // MVCArray of LatLngs.
            var vertices = this.getPath();

            var contentString = '<b>Bermuda Triangle polygon</b><br>' +
                'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
                '<br>';

            // Iterate over the vertices.
            for (var i =0; i < vertices.getLength(); i++) {
                var xy = vertices.getAt(i);

                contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();
            }

            // Replace the info window's content and position.
            infoWindow.setContent(contentString);
            infoWindow.setPosition(event.latLng);

            infoWindow.open(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush