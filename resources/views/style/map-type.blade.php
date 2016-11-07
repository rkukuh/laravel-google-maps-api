@extends('layouts.app')

@section('title', 'Style map styles')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Style map styles
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
            var styledMapType = new google.maps.StyledMapType([
                {
                    stylers: [
                        { hue: '#00ffe6' },
                        { saturation: -20 }
                    ]
                }, {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [
                        { lightness: 100 },
                        { visibility: 'simplified' }
                    ]
                }, {
                    featureType: 'road',
                    elementType: 'labels',
                    stylers: [
                        { visibility: 'off' }
                    ]
                }],
                {name: 'Styled Map'}
            );

            var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -7.265757, lng: 112.734146},
                    zoom: 15,
                    mapTypeControlOptions: {
                    mapTypeIds: [
                        'roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map'
                    ]
                }
            });

            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType([
                {
                    stylers: [
                        { hue: &apos;#00ffe6&apos; },
                        { saturation: -20 }
                    ]
                }, {
                    featureType: &apos;road&apos;,
                    elementType: &apos;geometry&apos;,
                    stylers: [
                        { lightness: 100 },
                        { visibility: &apos;simplified&apos; }
                    ]
                }, {
                    featureType: &apos;road&apos;,
                    elementType: &apos;labels&apos;,
                    stylers: [
                        { visibility: &apos;off&apos; }
                    ]
                }],
                {name: &apos;Styled Map&apos;}
            );

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                    center: {lat: -7.265757, lng: 112.734146},
                    zoom: 15,
                    mapTypeControlOptions: {
                    mapTypeIds: [
                        &apos;roadmap&apos;, &apos;satellite&apos;, &apos;hybrid&apos;, &apos;terrain&apos;, &apos;styled_map&apos;
                    ]
                }
            });

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set(&apos;styled_map&apos;, styledMapType);
            map.setMapTypeId(&apos;styled_map&apos;);
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
