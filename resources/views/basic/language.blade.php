@extends('layouts.app')

@section('title', 'Localizing the Map')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Localizing the Map <small>(ID to JA)</small>
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
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 8,
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap&language=ja&region=JP"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example displays a map with the language and region set
        // to Japan. These settings are specified in the HTML script element
        // when loading the Google Maps JavaScript API.
        // Setting the language shows the map in the language of your choice.
        // Setting the region biases the geocoding results to that region.

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 8,
            });
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&amp;language=ja&amp;region=JP&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
