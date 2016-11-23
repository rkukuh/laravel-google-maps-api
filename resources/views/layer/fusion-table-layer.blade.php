@extends('layouts.app')

@section('title', 'Fusion Table: Layer')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Fusion Table: Layer
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
                center  : {lat: 41.850033, lng: -87.6500523},
                zoom    : 11
            });

            var layer = new google.maps.FusionTablesLayer({
                query: {
                    select  : '\'Geocodable address\'',
                    from    : '1mZ53Z70NsChnBMm-qEYmSDOvLXgrreLTkQUvvg'
                }
            });

            layer.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
