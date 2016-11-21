@extends('layouts.app')

@section('title', 'Data Layer: Polygon')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Polygon
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
                zoom    : 6,
                center  : {lat: -33.872, lng: 151.252},
            });

            var outerCoords = [
                {lat: -32.364, lng: 153.207},
                {lat: -35.364, lng: 153.207},
                {lat: -35.364, lng: 158.207},
                {lat: -32.364, lng: 158.207}
                ];

            var innerCoords1 = [
                {lat: -33.364, lng: 154.207},
                {lat: -34.364, lng: 154.207},
                {lat: -34.364, lng: 155.207},
                {lat: -33.364, lng: 155.207}
            ];

            var innerCoords2 = [
                {lat: -33.364, lng: 156.207},
                {lat: -34.364, lng: 156.207},
                {lat: -34.364, lng: 157.207},
                {lat: -33.364, lng: 157.207}
            ];

            map.data.add({
                geometry: new google.maps.Data.Polygon([
                                outerCoords,
                                innerCoords1,
                                innerCoords2
                            ])
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 6,
                center  : {lat: -33.872, lng: 151.252},
            });

            // Define the LatLng coordinates for the outer path.
            var outerCoords = [
                {lat: -32.364, lng: 153.207}, // north west
                {lat: -35.364, lng: 153.207}, // south west
                {lat: -35.364, lng: 158.207}, // south east
                {lat: -32.364, lng: 158.207}  // north east
                ];

            // Define the LatLng coordinates for an inner path.
            var innerCoords1 = [
                {lat: -33.364, lng: 154.207},
                {lat: -34.364, lng: 154.207},
                {lat: -34.364, lng: 155.207},
                {lat: -33.364, lng: 155.207}
            ];

            // Define the LatLng coordinates for another inner path.
            var innerCoords2 = [
                {lat: -33.364, lng: 156.207},
                {lat: -34.364, lng: 156.207},
                {lat: -34.364, lng: 157.207},
                {lat: -33.364, lng: 157.207}
            ];

            map.data.add({
                geometry: new google.maps.Data.Polygon([
                                outerCoords,
                                innerCoords1,
                                innerCoords2
                            ])
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
