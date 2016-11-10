@extends('layouts.app')

@section('title', 'Custom symbols')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom symbols
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

            var symbolOne = {
                path: 'M -2,0 0,-2 2,0 0,2 z',
                strokeColor: '#F00',
                fillColor: '#F00',
                fillOpacity: 1
            };

            var symbolTwo = {
                path: 'M -1,0 A 1,1 0 0 0 -3,0 1,1 0 0 0 -1,0M 1,0 A 1,1 0 0 0 3,0 1,1 0 0 0 1,0M -3,3 Q 0,5 3,3',
                strokeColor: '#00F',
                rotation: 45
            };

            var symbolThree = {
                path: 'M -2,-2 2,2 M 2,-2 -2,2',
                strokeColor: '#292',
                strokeWeight: 4
            };

            var line = new google.maps.Polyline({
                path: [
                    {lat: 22.291, lng: 153.027},
                    {lat: 18.291, lng: 153.027}
                ],
                icons: [
                    {
                        icon: symbolOne,
                        offset: '0%'
                    }, {
                        icon: symbolTwo,
                        offset: '50%'
                    }, {
                        icon: symbolThree,
                        offset: '100%'
                    }
                ],
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

            var symbolOne = {
                path: &apos;M -2,0 0,-2 2,0 0,2 z&apos;,
                strokeColor: &apos;#F00&apos;,
                fillColor: &apos;#F00&apos;,
                fillOpacity: 1
            };

            var symbolTwo = {
                path: &apos;M -1,0 A 1,1 0 0 0 -3,0 1,1 0 0 0 -1,0M 1,0 A 1,1 0 0 0 3,0 1,1 0 0 0 1,0M -3,3 Q 0,5 3,3&apos;,
                strokeColor: &apos;#00F&apos;,
                rotation: 45
            };

            var symbolThree = {
                path: &apos;M -2,-2 2,2 M 2,-2 -2,2&apos;,
                strokeColor: &apos;#292&apos;,
                strokeWeight: 4
            };

            var line = new google.maps.Polyline({
                path: [
                    {lat: 22.291, lng: 153.027},
                    {lat: 18.291, lng: 153.027}
                ],
                icons: [
                    {
                        icon: symbolOne,
                        offset: &apos;0%&apos;
                    }, {
                        icon: symbolTwo,
                        offset: &apos;50%&apos;
                    }, {
                        icon: symbolThree,
                        offset: &apos;100%&apos;
                    }
                ],
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
