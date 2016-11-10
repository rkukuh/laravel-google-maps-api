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
                zoom        : 15,
                center      : {lat: -7.265757, lng: 112.734146},
                mapTypeId   : 'terrain'
            });

            var lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
            };

            var line = new google.maps.Polyline({
                path: [
                    {lat: -7.265757, lng: 112.734146},
                    {lat: -7.257757, lng: 112.734146},
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

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 15,
                center      : {lat: -7.265757, lng: 112.734146},
                mapTypeId   : &apos;terrain&apos;
            });

            var lineSymbol = {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
            };

            var line = new google.maps.Polyline({
                path: [
                    {lat: -7.265757, lng: 112.734146},
                    {lat: -7.257757, lng: 112.734146},
                ],
                icons: [{
                    icon: lineSymbol,
                    offset: &apos;100%&apos;
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
