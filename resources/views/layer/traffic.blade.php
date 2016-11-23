@extends('layouts.app')

@section('title', 'Traffic layer')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Traffic layer
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
                zoom    : 13,
                center  : {lat: 34.04924594193164, lng: -118.24104309082031}
            });

            var trafficLayer = new google.maps.TrafficLayer();

            trafficLayer.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 13,
                center  : {lat: 34.04924594193164, lng: -118.24104309082031}
            });

            var trafficLayer = new google.maps.TrafficLayer();

            trafficLayer.setMap(map);
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
