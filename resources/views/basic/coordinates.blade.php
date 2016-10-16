@extends('layouts.app')

@section('title', 'Showing pixel and tile coordinates')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Showing pixel and tile coordinates
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
        function initMap() {
            var surabaya = new google.maps.LatLng(-7.265757, 112.734146);

            var map = new google.maps.Map(document.getElementById('map'), {
                center: surabaya,
                zoom: 9
            });

            var coordInfoWindow = new google.maps.InfoWindow();

            coordInfoWindow.setContent(createInfoWindowContent(surabaya, map.getZoom()));
            coordInfoWindow.setPosition(surabaya);
            coordInfoWindow.open(map);

            map.addListener('zoom_changed', function() {
                coordInfoWindow.setContent(createInfoWindowContent(surabaya, map.getZoom()));
                coordInfoWindow.open(map);
            });
        }

        var TILE_SIZE = 256;

        function createInfoWindowContent(latLng, zoom) {
            var scale = 1 << zoom;

            var worldCoordinate = project(latLng);

            var pixelCoordinate = new google.maps.Point(
                Math.floor(worldCoordinate.x * scale),
                Math.floor(worldCoordinate.y * scale)
            );

            var tileCoordinate = new google.maps.Point(
                Math.floor(worldCoordinate.x * scale / TILE_SIZE),
                Math.floor(worldCoordinate.y * scale / TILE_SIZE)
            );

            return [
                '<h3>Surabaya, East Java, Indonesia</h3>',
                'LatLng: ' + latLng,
                'Zoom level: ' + zoom,
                'World Coordinate: ' + worldCoordinate,
                'Pixel Coordinate: ' + pixelCoordinate,
                'Tile Coordinate: ' + tileCoordinate
            ].join('<br>');
        }

        function project(latLng) {
            var siny = Math.sin(latLng.lat() * Math.PI / 180);

            siny = Math.min(Math.max(siny, -0.9999), 0.9999);

            return new google.maps.Point(
                TILE_SIZE * (0.5 + latLng.lng() / 360),
                TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI))
            );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var surabaya = new google.maps.LatLng(-7.265757, 112.734146);

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: surabaya,
                zoom: 9
            });

            var coordInfoWindow = new google.maps.InfoWindow();

            coordInfoWindow.setContent(createInfoWindowContent(surabaya, map.getZoom()));
            coordInfoWindow.setPosition(surabaya);
            coordInfoWindow.open(map);

            map.addListener(&apos;zoom_changed&apos;, function() {
                coordInfoWindow.setContent(createInfoWindowContent(surabaya, map.getZoom()));
                coordInfoWindow.open(map);
            });
        }

        var TILE_SIZE = 256;

        function createInfoWindowContent(latLng, zoom) {
            var scale = 1 &lt;&lt; zoom;

            var worldCoordinate = project(latLng);

            var pixelCoordinate = new google.maps.Point(
                Math.floor(worldCoordinate.x * scale),
                Math.floor(worldCoordinate.y * scale)
            );

            var tileCoordinate = new google.maps.Point(
                Math.floor(worldCoordinate.x * scale / TILE_SIZE),
                Math.floor(worldCoordinate.y * scale / TILE_SIZE)
            );

            return [
                &apos;&lt;h3&gt;Surabaya, East Java, Indonesia&lt;/h3&gt;&apos;,
                &apos;LatLng: &apos; + latLng,
                &apos;Zoom level: &apos; + zoom,
                &apos;World Coordinate: &apos; + worldCoordinate,
                &apos;Pixel Coordinate: &apos; + pixelCoordinate,
                &apos;Tile Coordinate: &apos; + tileCoordinate
            ].join(&apos;&lt;br&gt;&apos;);
        }

        // The mapping between latitude, longitude and pixels is defined by the web
        // mercator projection.
        function project(latLng) {
            var siny = Math.sin(latLng.lat() * Math.PI / 180);

            // Truncating to 0.9999 effectively limits latitude to 89.189. This is
            // about a third of a tile past the edge of the world tile.
            siny = Math.min(Math.max(siny, -0.9999), 0.9999);

            return new google.maps.Point(
                TILE_SIZE * (0.5 + latLng.lng() / 360),
                TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI))
            );
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
