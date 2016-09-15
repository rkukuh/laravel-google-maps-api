@extends('layouts.app')

@section('title', 'Rectangle')

@section('content')
    <h1>Rectangle</h1>

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
                zoom        : 11,
                center      : {lat: 33.678, lng: -116.243},
                mapTypeId   : 'terrain'
            });

            var rectangle = new google.maps.Rectangle({
                strokeColor     : '#FF0000',
                strokeOpacity   : 0.8,
                strokeWeight    : 2,
                fillColor       : '#FF0000',
                fillOpacity     : 0.35,
                map             : map,
                bounds: {
                    north: 33.685,
                    south: 33.671,
                    east: -116.234,
                    west: -116.251
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
