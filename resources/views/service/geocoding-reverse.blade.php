@extends('layouts.app')

@section('title', 'Reverse Geocoding')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Reverse Geocoding
    </h1>

    <div id="floating-panel">
        <input id="latlng" type="text" value="40.714224, -73.961452">
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
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            left: 55%;
            margin-left: -180px;
            width: 350px;
        }

        #latlng {
            width: 225px;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center: {lat: -7.265757, lng: 112.734146},
            });

            var geocoder   = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;

            document.getElementById('submit').addEventListener('click', function() {
                geocodeLatLng(geocoder, map, infowindow);
            });
        }

        function geocodeLatLng(geocoder, map, infowindow) {
            var input       = document.getElementById('latlng').value;
            var latlngStr   = input.split(',', 2);
            var latlng      = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        map.setZoom(11);

                        var marker = new google.maps.Marker({
                            position: latlng,
                            map     : map
                        });

                        infowindow.setContent(results[1].formatted_address);
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
                center: {lat: -7.265757, lng: 112.734146},
            });

            var geocoder   = new google.maps.Geocoder;
            var infowindow = new google.maps.InfoWindow;

            document.getElementById(&apos;submit&apos;).addEventListener(&apos;click&apos;, function() {
                geocodeLatLng(geocoder, map, infowindow);
            });
        }

        function geocodeLatLng(geocoder, map, infowindow) {
            var input       = document.getElementById(&apos;latlng&apos;).value;
            var latlngStr   = input.split(&apos;,&apos;, 2);
            var latlng      = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

            geocoder.geocode({&apos;location&apos;: latlng}, function(results, status) {
                if (status === &apos;OK&apos;) {
                    if (results[1]) {
                        map.setZoom(11);

                        var marker = new google.maps.Marker({
                            position: latlng,
                            map     : map
                        });

                        infowindow.setContent(results[1].formatted_address);
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

    #floating-panel {
        position: absolute;
        top: 10px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
        left: 55%;
        margin-left: -180px;
        width: 350px;
    }

    #latlng {
        width: 225px;
    }
@endsection

@section('source-code-html')

    &lt;div id=&quot;floating-panel&quot;&gt;
        &lt;input id=&quot;latlng&quot; type=&quot;text&quot; value=&quot;40.714224, -73.961452&quot;&gt;
        &lt;input id=&quot;submit&quot; type=&quot;button&quot; value=&quot;Find&quot;&gt;
    &lt;/div&gt;

    &lt;span class=&quot;text-primary&quot;&gt;Use &quot;Server Key&quot; instead of &quot;Browser Key&quot;&lt;/span&gt;
    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;
@endsection
