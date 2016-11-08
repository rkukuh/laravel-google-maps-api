@extends('layouts.app')

@section('title', 'Marker labels')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Marker labels
    </h1>

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
        var labels      = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var labelIndex  = 0;

        function initialize() {
            var bangalore = {lat: -7.265757, lng: 112.734146};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 12,
                center  : bangalore
            });

            google.maps.event.addListener(map, 'click', function(event) {
                addMarker(event.latLng, map);
            });

            addMarker(bangalore, map);
        }

        function addMarker(location, map) {
            var marker = new google.maps.Marker({
                position    : location,
                label       : labels[labelIndex++ % labels.length],
                map         : map
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endpush

@section('source-code-javascript')

    &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        // In the following example, markers appear when the user clicks on the map.
        // Each marker is labeled with a single alphabetical character.
        var labels      = &apos;ABCDEFGHIJKLMNOPQRSTUVWXYZ&apos;;
        var labelIndex  = 0;

        function initialize() {
            var bangalore = {lat: -7.265757, lng: 112.734146};

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 12,
                center  : bangalore
            });

            // This event listener calls addMarker() when the map is clicked.
            google.maps.event.addListener(map, &apos;click&apos;, function(event) {
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

        google.maps.event.addDomListener(window, &apos;load&apos;, initialize);
    &lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
