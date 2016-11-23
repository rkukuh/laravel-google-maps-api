@extends('layouts.app')

@section('title', 'GeoRSS')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        GeoRSS
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
                zoom    : 4,
                center  : {lat: 49.496675, lng: -102.65625}
            });

            var georssLayer = new google.maps.KmlLayer({
                url: 'http://api.flickr.com/services/feeds/geo/?g=322338@N20&lang=en-us&format=feed-georss'
            });

            georssLayer.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 4,
                center  : {lat: 49.496675, lng: -102.65625}
            });

            var georssLayer = new google.maps.KmlLayer({
                url: &apos;http://api.flickr.com/services/feeds/geo/?g=322338@N20&amp;lang=en-us&amp;format=feed-georss&apos;
            });

            georssLayer.setMap(map);
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
