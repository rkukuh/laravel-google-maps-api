@extends('layouts.app')

@section('title', 'Geometry: Navigation functions')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Geometry: Navigation functions
    </h1>

    <div id="map"></div>

    <div id="floating-panel">
        Origin: <input type="text" readonly id="origin">
        Destination: <input type="text" readonly id="destination"><br>
        Heading: <input type="text" readonly id="heading"> degrees
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 55%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        var marker1, marker2;
        var poly, geodesicPoly;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: {lat: 34, lng: -40.605}
            });

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                document.getElementById('info')
            );

            marker1 = new google.maps.Marker({
                map: map,
                draggable: true,
                position: {lat: 40.714, lng: -74.006}
            });

            marker2 = new google.maps.Marker({
                map: map,
                draggable: true,
                position: {lat: 48.857, lng: 2.352}
            });

            var bounds = new google.maps.LatLngBounds(
                marker1.getPosition(), marker2.getPosition()
            );

            map.fitBounds(bounds);

            google.maps.event.addListener(marker1, 'position_changed', update);
            google.maps.event.addListener(marker2, 'position_changed', update);

            poly = new google.maps.Polyline({
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 3,
                map: map,
            });

            geodesicPoly = new google.maps.Polyline({
                strokeColor: '#CC0099',
                strokeOpacity: 1.0,
                strokeWeight: 3,
                geodesic: true,
                map: map
            });

            update();
        }

        function update() {
            var path = [marker1.getPosition(), marker2.getPosition()];

            poly.setPath(path);
            geodesicPoly.setPath(path);

            var heading = google.maps.geometry.spherical.computeHeading(path[0], path[1]);

            document.getElementById('heading').value = heading;
            document.getElementById('origin').value = path[0].toString();
            document.getElementById('destination').value = path[1].toString();
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=geometry&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Geometry library. Include the libraries=geometry
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=geometry&quot;&gt;

        var marker1, marker2;
        var poly, geodesicPoly;

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom: 4,
                center: {lat: 34, lng: -40.605}
            });

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(
                document.getElementById(&apos;info&apos;)
            );

            marker1 = new google.maps.Marker({
                map: map,
                draggable: true,
                position: {lat: 40.714, lng: -74.006}
            });

            marker2 = new google.maps.Marker({
                map: map,
                draggable: true,
                position: {lat: 48.857, lng: 2.352}
            });

            var bounds = new google.maps.LatLngBounds(
                marker1.getPosition(), marker2.getPosition()
            );

            map.fitBounds(bounds);

            google.maps.event.addListener(marker1, &apos;position_changed&apos;, update);
            google.maps.event.addListener(marker2, &apos;position_changed&apos;, update);

            poly = new google.maps.Polyline({
                strokeColor: &apos;#FF0000&apos;,
                strokeOpacity: 1.0,
                strokeWeight: 3,
                map: map,
            });

            geodesicPoly = new google.maps.Polyline({
                strokeColor: &apos;#CC0099&apos;,
                strokeOpacity: 1.0,
                strokeWeight: 3,
                geodesic: true,
                map: map
            });

            update();
        }

        function update() {
            var path = [marker1.getPosition(), marker2.getPosition()];

            poly.setPath(path);
            geodesicPoly.setPath(path);

            var heading = google.maps.geometry.spherical.computeHeading(path[0], path[1]);

            document.getElementById(&apos;heading&apos;).value = heading;
            document.getElementById(&apos;origin&apos;).value = path[0].toString();
            document.getElementById(&apos;destination&apos;).value = path[1].toString();
        }
    &lt;/script&gt;

    &lt;script async defer
    src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;libraries=geometry&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
