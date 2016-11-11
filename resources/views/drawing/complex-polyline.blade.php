@extends('layouts.app')

@section('title', 'Complex polyline')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Complex polyline
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
        var poly;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 7,
                center  : {lat: 41.879, lng: -87.624}
            });

            poly = new google.maps.Polyline({
                strokeColor: '#FF00FF',
                strokeOpacity: 1.0,
                strokeWeight: 3
            });

            poly.setMap(map);

            map.addListener('click', addLatLng);
        }

        function addLatLng(event) {
            var path = poly.getPath();

            path.push(event.latLng);

            var marker = new google.maps.Marker({
                position    : event.latLng,
                title       : '#' + path.getLength(),
                map         : map
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example creates an interactive map which constructs a polyline based on
        // user clicks. Note that the polyline only appears once its path property
        // contains two LatLng coordinates.

        var poly;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 7,
                center  : {lat: 41.879, lng: -87.624}
            });

            poly = new google.maps.Polyline({
                strokeColor: &apos;#FF00FF&apos;,
                strokeOpacity: 1.0,
                strokeWeight: 3
            });

            poly.setMap(map);

            // Add a listener for the click event
            map.addListener(&apos;click&apos;, addLatLng);
        }

        // Handles click events on a map, and adds a new point to the Polyline.
        function addLatLng(event) {
            var path = poly.getPath();

            // Because path is an MVCArray, we can simply append a new coordinate
            // and it will automatically appear.
            path.push(event.latLng);

            // Add a new marker at the new plotted point on the polyline.
            var marker = new google.maps.Marker({
                position    : event.latLng,
                title       : &apos;#&apos; + path.getLength(),
                map         : map
            });
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
