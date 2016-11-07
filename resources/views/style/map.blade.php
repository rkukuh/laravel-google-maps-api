@extends('layouts.app')

@section('title', 'Styled maps')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Styled maps
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
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 12,
                styles: [
                    {
                        featureType: 'all',
                        stylers: [
                            { saturation: -80 }
                        ]
                    }, {
                        featureType: 'road.arterial',
                        elementType: 'geometry',
                        stylers: [
                            { hue: '#00ffee' },
                            { saturation: 50 }
                        ]
                    }, {
                        featureType: 'poi.business',
                        elementType: 'labels',
                        stylers: [
                            { visibility: 'off' }
                        ]
                    }
                ]
            });
        }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

        &lt;script&gt;
            function initMap() {
                var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                    center: {lat: -7.265757, lng: 112.734146},
                    zoom: 12,
                    styles: [
                        {
                            featureType: &apos;all&apos;,
                            stylers: [
                                { saturation: -80 }
                            ]
                        }, {
                            featureType: &apos;road.arterial&apos;,
                            elementType: &apos;geometry&apos;,
                            stylers: [
                                { hue: &apos;#00ffee&apos; },
                                { saturation: 50 }
                            ]
                        }, {
                            featureType: &apos;poi.business&apos;,
                            elementType: &apos;labels&apos;,
                            stylers: [
                                { visibility: &apos;off&apos; }
                            ]
                        }
                    ]
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
