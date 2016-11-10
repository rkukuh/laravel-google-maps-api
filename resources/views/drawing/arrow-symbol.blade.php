@extends('layouts.app')

@section('title', 'Arrow symbol')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Arrow symbol
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
                zoom        : 6,
                center      : {lat: -23.363, lng: 131.044},
                mapTypeId   : 'terrain'
            });

            var lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
            };

            var line = new google.maps.Polyline({
                path: [
                    {lat: -25.363, lng: 131.044},
                    {lat: -20.363, lng: 131.044},
                ],
                icons: [{
                    icon: lineSymbol,
                    offset: '100%'
                }],
                map: map
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
