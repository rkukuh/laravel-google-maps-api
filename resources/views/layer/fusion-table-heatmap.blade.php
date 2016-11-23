@extends('layouts.app')

@section('title', 'Fusion Table: Heatmap')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Fusion Table: Heatmap
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
                center  : {lat: 10, lng: -140},
                zoom    : 3
            });

            var layer = new google.maps.FusionTablesLayer({
                query: {
                    select: 'location',
                    from: '1xWyeuAhIFK_aED1ikkQEGmR8mINSCJO9Vq-BPQ'
                },
                heatmap: {
                    enabled: true
                }
            });

            layer.setMap(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
