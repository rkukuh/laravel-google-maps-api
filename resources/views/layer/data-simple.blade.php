@extends('layouts.app')

@section('title', 'Data Layer: Simple')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Simple
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
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 4,
                center  : {lat: -28, lng: 137}
            });

            // NOTE: This uses cross-domain XHR, and may not work on older browsers.
            map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 4,
                center  : {lat: -28, lng: 137}
            });

            // NOTE: This uses cross-domain XHR, and may not work on older browsers.
            map.data.loadGeoJson(&apos;https://storage.googleapis.com/mapsdevsite/json/google.json&apos;);
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
