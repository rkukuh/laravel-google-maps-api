@extends('layouts.app')

@section('title', 'Data Layer: Event')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Event
    </h1>

    <div id="map"></div>
    <div id="info-box">?</div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #info-box {
            background-color: white;
            border: 1px solid black;
            bottom: 30px;
            padding: 10px;
            position: absolute;
            left: 30px;
        }
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

            map.data.loadGeoJson('https://storage.googleapis.com/maps-devrel/google.json');

            map.data.setStyle(function(feature) {
                return /** @type {google.maps.Data.StyleOptions} */({
                    fillColor    : feature.getProperty('color'),
                    strokeWeight : 1
                });
            });

            // Set mouseover event for each feature.
            map.data.addListener('mouseover', function(event) {
                document.getElementById('info-box').textContent = event.feature.getProperty('letter');
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

            map.data.loadGeoJson(&apos;https://storage.googleapis.com/maps-devrel/google.json&apos;);

            map.data.setStyle(function(feature) {
                return /** @type {google.maps.Data.StyleOptions} */({
                    fillColor    : feature.getProperty(&apos;color&apos;),
                    strokeWeight : 1
                });
            });

            // Set mouseover event for each feature.
            map.data.addListener(&apos;mouseover&apos;, function(event) {
                document.getElementById(&apos;info-box&apos;).textContent = event.feature.getProperty(&apos;letter&apos;);
            });
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map { height: 500px; }

    #info-box {
        background-color: white;
        border: 1px solid black;
        bottom: 30px;
        padding: 10px;
        position: absolute;
        left: 30px;
    }
@endsection

@section('source-code-html')

    <div id="map"></div>
    <div id="info-box">?</div>
@endsection
