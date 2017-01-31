@extends('layouts.app')

@section('title', 'Geocoding Component Restriction')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Geocoding Component Restriction
    </h1>

    <span class="text-primary">Use "Server Key" instead of "Browser Key"</span>
    <div id="map"></div>

    <div id="floating-panel">
        <pre>componentRestrictions: {country: "AU", postalCode: "2000"}</pre>
        <button id="submit">Geocode</button>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 95px;
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
            var geocoder = new google.maps.Geocoder;
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, map) {
            geocoder.geocode({
                    componentRestrictions: {
                        country     : 'AU',
                        postalCode  : '2000'
                    }
                },
                function(results, status) {
                    if (status === 'OK') {
                        map.setCenter(results[0].geometry.location);

                        new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    }
                    else {
                        window.alert('Geocode was not successful for the following reason: ' + status);
                    }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var geocoder = new google.maps.Geocoder;
                var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            document.getElementById(&apos;submit&apos;).addEventListener(&apos;click&apos;, function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, map) {
            geocoder.geocode({
                    componentRestrictions: {
                        country     : &apos;AU&apos;,
                        postalCode  : &apos;2000&apos;
                    }
                },
                function(results, status) {
                    if (status === &apos;OK&apos;) {
                        map.setCenter(results[0].geometry.location);

                        new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    }
                    else {
                        window.alert(&apos;Geocode was not successful for the following reason: &apos; + status);
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
        top: 95px;
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

    &lt;span class=&quot;text-primary&quot;&gt;Use &quot;Server Key&quot; instead of &quot;Browser Key&quot;&lt;/span&gt;
    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;

    &lt;div id=&quot;floating-panel&quot;&gt;
        &lt;pre&gt;componentRestrictions: {country: &quot;AU&quot;, postalCode: &quot;2000&quot;}&lt;/pre&gt;
        &lt;button id=&quot;submit&quot;&gt;Geocode&lt;/button&gt;
    &lt;/div&gt;
@endsection
