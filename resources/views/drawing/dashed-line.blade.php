@extends('layouts.app')

@section('title', 'Dashed line (symbol)')

@section('content')
    <h1>Dashed line (symbol)</h1>

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
                center      : {lat: 20.291, lng: 153.027},
                mapTypeId   : 'terrain'
            });

            var lineSymbol = {
                path: 'M 0,-1 0,1',
                strokeOpacity: 1,
                scale: 4
            };

            // Repeat the symbol at intervals of 20 pixels to create the dashed effect.
            var line = new google.maps.Polyline({
                path: [
                    {lat: 22.291, lng: 153.027},
                    {lat: 18.291, lng: 153.027}
                ],
                strokeOpacity: 0,
                icons: [{
                    icon: lineSymbol,
                    offset: '0',
                    repeat: '20px'
                }],
                map: map
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
