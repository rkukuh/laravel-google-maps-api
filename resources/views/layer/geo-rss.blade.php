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
