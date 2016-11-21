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

            map.data.addListener('click', function(event) {
                event.feature.setProperty('isColorful', true);
            });

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

@section('source-code-javascript')

    &lt;script&gt;
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 4,
                center  : {lat: -28, lng: 137}
            });

            map.data.loadGeoJson(&apos;https://storage.googleapis.com/mapsdevsite/json/google.json&apos;);

            // Color each letter gray. Change the color when the isColorful property is set to true.
            map.data.setStyle(function(feature) {
                var color = &apos;gray&apos;;

                if (feature.getProperty(&apos;isColorful&apos;)) {
                    color = feature.getProperty(&apos;color&apos;);
                }

                return /** @type {google.maps.Data.StyleOptions} */({
                    fillColor    : color,
                    strokeColor  : color,
                    strokeWeight : 2
                });
            });

            // When the user clicks, set &apos;isColorful&apos;, changing the color of the letters.
            map.data.addListener(&apos;click&apos;, function(event) {
                event.feature.setProperty(&apos;isColorful&apos;, true);
            });

            // When the user hovers, tempt them to click by outlining the letters.
            // Call revertStyle() to remove all overrides. This will use the style rules
            // defined in the function passed to setStyle()
            map.data.addListener(&apos;mouseover&apos;, function(event) {
                map.data.revertStyle();
                map.data.overrideStyle(event.feature, {strokeWeight: 8});
            });

            map.data.addListener(&apos;mouseout&apos;, function(event) {
                map.data.revertStyle();
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
