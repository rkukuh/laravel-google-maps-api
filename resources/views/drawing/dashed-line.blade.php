@extends('layouts.app')

@section('title', 'Dashed line (symbol)')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Dashed line (symbol)
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

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 6,
                center      : {lat: 20.291, lng: 153.027},
                mapTypeId   : &apos;terrain&apos;
            });

            var lineSymbol = {
                path: &apos;M 0,-1 0,1&apos;,
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
                    offset: &apos;0&apos;,
                    repeat: &apos;20px&apos;
                }],
                map: map
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
