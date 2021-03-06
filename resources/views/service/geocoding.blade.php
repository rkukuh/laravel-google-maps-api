@extends('layouts.app')

@section('title', 'Geocoding')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Geocoding
    </h1>

    <div id="floating-panel">
        <input id="address" type="textbox" value="Surabaya, Indonesia">
        <input id="submit" type="button" value="Geocode">
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
            left: 35%;
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
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146},
            });

            var geocoder = new google.maps.Geocoder();

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;

            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);

                    var marker = new google.maps.Marker({
                        map     : resultsMap,
                        position: results[0].geometry.location
                    });
                }
                else {
                    alert('Geocode was not successful for the following reason: ' + status);
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
                center  : {lat: -7.265757, lng: 112.734146},
            });

            var geocoder = new google.maps.Geocoder();

            document.getElementById(&apos;submit&apos;).addEventListener(&apos;click&apos;, function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById(&apos;address&apos;).value;

            geocoder.geocode({&apos;address&apos;: address}, function(results, status) {
                if (status === &apos;OK&apos;) {
                    resultsMap.setCenter(results[0].geometry.location);

                    var marker = new google.maps.Marker({
                        map     : resultsMap,
                        position: results[0].geometry.location
                    });
                }
                else {
                    alert(&apos;Geocode was not successful for the following reason: &apos; + status);
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
        left: 35%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
@endsection

@section('source-code-html')

    &lt;div id=&quot;floating-panel&quot;&gt;
        &lt;input id=&quot;address&quot; type=&quot;textbox&quot; value=&quot;Surabaya, Indonesia&quot;&gt;
        &lt;input id=&quot;submit&quot; type=&quot;button&quot; value=&quot;Geocode&quot;&gt;
    &lt;/div&gt;

    &lt;span class=&quot;text-primary&quot;&gt;Use &quot;Server Key&quot; instead of &quot;Browser Key&quot;&lt;/span&gt;
    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;
@endsection
