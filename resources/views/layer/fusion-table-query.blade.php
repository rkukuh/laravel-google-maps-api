@extends('layouts.app')

@section('title', 'Fusion Table: Query')

@section('content')
    <h1>Fusion Table: Query</h1>

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
            center  : {lat: 41.948766, lng: -87.691497},
            zoom    : 12
        });

        var layer = new google.maps.FusionTablesLayer({
            query: {
                select: 'address',
                from: '1d7qpn60tAvG4LEg4jvClZbc1ggp8fIGGvpMGzA',
                where: 'ridership > 5000'
            }
        });

        layer.setMap(map);
    }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
