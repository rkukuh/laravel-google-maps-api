@extends('layouts.app')

@section('title', 'Geometry: Encoding methods')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Geometry: Encoding methods
    </h1>

    <div id="map"></div>

    <div id="right-panel">
        <div>Encoding:</div>
        <textarea id="encoded-polyline"></textarea>
    </div>
@endsection

@push('css')
    <style>
        #map {
            height: 500px;
            width: 55%;
            float: left;
        }

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            width: 45%;
            float: left;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        #encoded-polyline {
            height: 100px;
            width: 100%;
        }
    </style>
@endpush

@push('js')
    <script>
        // This example requires the Geometry library. Include the libraries=geometry
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: {lat: 34.366, lng: -89.519}
            });

            var poly = new google.maps.Polyline({
                strokeColor: '#000000',
                strokeOpacity: 1,
                strokeWeight: 3,
                map: map
            });

            // Add a listener for the click event
            google.maps.event.addListener(map, 'click', function(event) {
                addLatLngToPoly(event.latLng, poly);
            });
        }

        /**
        * Handles click events on a map, and adds a new point to the Polyline.
        * Updates the encoding text area with the path's encoded values.
        */
        function addLatLngToPoly(latLng, poly) {
            var path = poly.getPath();
            // Because path is an MVCArray, we can simply append a new coordinate
            // and it will automatically appear
            path.push(latLng);

            // Update the text field to display the polyline encodings
            var encodeString = google.maps.geometry.encoding.encodePath(path);

            if (encodeString) {
                document.getElementById('encoded-polyline').value = encodeString;
            }
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=geometry&callback=initMap"></script>
@endpush
