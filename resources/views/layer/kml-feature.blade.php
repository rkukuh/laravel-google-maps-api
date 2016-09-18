@extends('layouts.app')

@section('title', 'KML feature detail')

@section('content')
    <h1>KML feature detail</h1>

    <div id="map"></div>
    <div id="content-window" class="text-primary"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #content-window {
            float: left;
            font-family: 'Roboto','sans-serif';
            height: 100%;
            line-height: 30px;
            padding-left: 10px;
            width: 19%;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 12,
                center  : {lat: 37.06, lng: -95.68}
            });

            var kmlLayer = new google.maps.KmlLayer({
                url : 'http://googlemaps.github.io/kml-samples/kml/Placemark/placemark.kml',
                map : map,
                suppressInfoWindows: true
            });

            kmlLayer.addListener('click', function(kmlEvent) {
                var text = kmlEvent.featureData.description;

                showInContentWindow(text);
            });

            function showInContentWindow(text) {
                var sidediv = document.getElementById('content-window');

                sidediv.innerHTML = text;
            }
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
