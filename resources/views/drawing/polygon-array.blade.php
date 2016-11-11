@extends('layouts.app')

@section('title', 'Polygon arrays')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Polygon arrays
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

@section('source-code-javascript')

    &lt;script&gt;
        // This example creates a simple polygon representing the Bermuda Triangle.
        // When the user clicks on the polygon an info window opens, showing
        // information about the polygon&apos;s coordinates.

        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 5,
                center      : {lat: 24.886, lng: -70.268},
                mapTypeId   : &apos;terrain&apos;
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
                strokeColor     : &apos;#FF0000&apos;,
                strokeOpacity   : 0.8,
                strokeWeight    : 3,
                fillColor       : &apos;#FF0000&apos;,
                fillOpacity     : 0.35
            });

            bermudaTriangle.setMap(map);

            // Add a listener for the click event.
            bermudaTriangle.addListener(&apos;click&apos;, showArrays);

            infoWindow = new google.maps.InfoWindow;
        }

        /** @this {google.maps.Polygon} */
        function showArrays(event) {
            // Since this polygon has only one path, we can call getPath() to return the
            // MVCArray of LatLngs.
            var vertices = this.getPath();

            var contentString = &apos;&lt;b&gt;Bermuda Triangle polygon&lt;/b&gt;&lt;br&gt;&apos; +
                &apos;Clicked location: &lt;br&gt;&apos; + event.latLng.lat() + &apos;,&apos; + event.latLng.lng() +
                &apos;&lt;br&gt;&apos;;

            // Iterate over the vertices.
            for (var i =0; i &lt; vertices.getLength(); i++) {
                var xy = vertices.getAt(i);

                contentString += &apos;&lt;br&gt;&apos; + &apos;Coordinate &apos; + i + &apos;:&lt;br&gt;&apos; + xy.lat() + &apos;,&apos; + xy.lng();
            }

            // Replace the info window&apos;s content and position.
            infoWindow.setContent(contentString);
            infoWindow.setPosition(event.latLng);

            infoWindow.open(map);
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
