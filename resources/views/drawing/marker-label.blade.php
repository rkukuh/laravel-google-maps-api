@extends('layouts.app')

@section('title', 'Marker labels')

@section('content')
    <h1>Marker labels</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}"></script>

    <script>
        // In the following example, markers appear when the user clicks on the map.
        // Each marker is labeled with a single alphabetical character.
        var labels      = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var labelIndex  = 0;

        function initialize() {
            var bangalore = { lat: 12.97, lng: 77.59 };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 12,
                center  : bangalore
            });

            // This event listener calls addMarker() when the map is clicked.
            google.maps.event.addListener(map, 'click', function(event) {
                addMarker(event.latLng, map);
            });

            // Add a marker at the center of the map.
            addMarker(bangalore, map);
        }

        // Adds a marker to the map.
        function addMarker(location, map) {
            // Add the marker at the clicked location, and add the next-available label
            // from the array of alphabetical characters.
            var marker = new google.maps.Marker({
                position    : location,
                label       : labels[labelIndex++ % labels.length],
                map         : map
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endpush
