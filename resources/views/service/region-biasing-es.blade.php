@extends('layouts.app')

@section('title', 'Region code biasing (ES)')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Region code biasing (ES)
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
            var map      = new google.maps.Map(document.getElementById('map'), {zoom: 8});
            var geocoder = new google.maps.Geocoder;

            geocoder.geocode({'address': 'Toledo'}, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);

                    new google.maps.Marker({
                        map     : map,
                        position: results[0].geometry.location
                    });
                }
                else {
                    window.alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&region=ES&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map      = new google.maps.Map(document.getElementById(&apos;map&apos;), {zoom: 8});
            var geocoder = new google.maps.Geocoder;

            geocoder.geocode({&apos;address&apos;: &apos;Toledo&apos;}, function(results, status) {
                if (status === &apos;OK&apos;) {
                    map.setCenter(results[0].geometry.location);

                    new google.maps.Marker({
                        map     : map,
                        position: results[0].geometry.location
                    });
                }
                else {
                    window.alert(&apos;Geocode was not successful for the following reason: &apos; + status);
                }
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $server_key_placeholder }}&amp;region=ES&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
