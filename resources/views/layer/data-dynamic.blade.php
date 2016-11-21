@extends('layouts.app')

@section('title', 'Data Layer: Dynamic styling')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Data Layer: Dynamic styling
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
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 4,
                center  : {lat: -28, lng: 137}
            });

            map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/google.json');

            // Color each letter gray. Change the color when the isColorful property is set to true.
            map.data.setStyle(function(feature) {
                var color = 'gray';

                if (feature.getProperty('isColorful')) {
                    color = feature.getProperty('color');
                }

                return /** @type {google.maps.Data.StyleOptions} */({
                    fillColor    : color,
                    strokeColor  : color,
                    strokeWeight : 2
                });
            });

            // When the user clicks, set 'isColorful', changing the color of the letters.
            map.data.addListener('click', function(event) {
                event.feature.setProperty('isColorful', true);
            });

            // When the user hovers, tempt them to click by outlining the letters.
            // Call revertStyle() to remove all overrides. This will use the style rules
            // defined in the function passed to setStyle()
            map.data.addListener('mouseover', function(event) {
                map.data.revertStyle();
                map.data.overrideStyle(event.feature, {strokeWeight: 8});
            });

            map.data.addListener('mouseout', function(event) {
                map.data.revertStyle();
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
