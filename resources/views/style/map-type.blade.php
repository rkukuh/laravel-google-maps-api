@extends('layouts.app')

@section('title', 'Style map styles')

@section('content')
    <h1>Style map styles</h1>

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
            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
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

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 55.647, lng: 37.581},
                    zoom: 11,
                    mapTypeControlOptions: {
                    mapTypeIds: [
                        'roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map'
                    ]
                }
            });

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
        }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
