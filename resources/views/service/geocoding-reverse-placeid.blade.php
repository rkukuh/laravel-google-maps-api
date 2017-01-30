@extends('layouts.app')

@section('title', 'Reverse Geocoding by Place ID')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Reverse Geocoding by Place ID
    </h1>

    <div id="floating-panel">
        <!-- Supply a default place ID for a place in Brooklyn, New York. -->
        <input id="place-id" type="text" value="ChIJd8BlQ2BZwokRAFUEcm_qrcA">
        <input id="submit" type="button" value="Find">
    </div>

    <span class="text-primary">Use "Server Key" instead of "Browser Key"</span>
    <div id="map"></div>
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
            width: 440px;
        }

        #place-id {
            width: 250px;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;

            document.getElementById('submit').addEventListener('click', function() {
                geocodePlaceId(geocoder, map, infowindow);
            });
        }

        function geocodePlaceId(geocoder, map, infowindow) {
            var placeId = document.getElementById('place-id').value;

            geocoder.geocode({'placeId': placeId}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(11);
                        map.setCenter(results[0].geometry.location);

                        var marker = new google.maps.Marker({
                            map     : map,
                            position: results[0].geometry.location
                        });

                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                    else {
                        window.alert('No results found');
                    }
                }
                else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            var geocoder = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;

            document.getElementById(&apos;submit&apos;).addEventListener(&apos;click&apos;, function() {
                geocodePlaceId(geocoder, map, infowindow);
            });
        }

        // This function is called when the user clicks the UI button requesting a reverse geocode.
        function geocodePlaceId(geocoder, map, infowindow) {
            var placeId = document.getElementById(&apos;place-id&apos;).value;

            geocoder.geocode({&apos;placeId&apos;: placeId}, function(results, status) {
                if (status === &apos;OK&apos;) {
                    if (results[0]) {
                        map.setZoom(11);
                        map.setCenter(results[0].geometry.location);

                        var marker = new google.maps.Marker({
                            map     : map,
                            position: results[0].geometry.location
                        });

                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                    else {
                        window.alert(&apos;No results found&apos;);
                    }
                }
                else {
                    window.alert(&apos;Geocoder failed due to: &apos; + status);
                }
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $server_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
