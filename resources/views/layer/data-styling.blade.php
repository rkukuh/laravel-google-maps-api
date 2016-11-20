@extends('layouts.app')

@section('title', 'Data Layer: Styling')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Styling
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

            map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');

            map.data.setStyle({
                fillColor    : 'red',
                strokeWeight : 2
            });
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

            map.data.loadGeoJson(&apos;https://storage.googleapis.com/mapsdevsite/json/google.json&apos;);

            map.data.setStyle({
                fillColor    : &apos;red&apos;,
                strokeWeight : 2
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
