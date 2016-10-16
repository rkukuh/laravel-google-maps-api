@extends('layouts.app')

@section('title', 'Getting properties with event handlers')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Getting properties with event handlers
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
            var originalMapCenter = new google.maps.LatLng(-7.265757, 112.734146);

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: originalMapCenter
            });

            var infowindow = new google.maps.InfoWindow({
                content: 'Change the zoom level',
                position: originalMapCenter
            });

            infowindow.open(map);

            map.addListener('zoom_changed', function() {
                infowindow.setContent('Zoom level: <b>' + map.getZoom() + '</b>');
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var originalMapCenter = new google.maps.LatLng(-7.265757, 112.734146);

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom: 6,
                center: originalMapCenter
            });

            var infowindow = new google.maps.InfoWindow({
                content: &apos;Change the zoom level&apos;,
                position: originalMapCenter
            });

            infowindow.open(map);

            map.addListener(&apos;zoom_changed&apos;, function() {
                infowindow.setContent(&apos;Zoom level: &lt;b&gt;&apos; + map.getZoom() + &apos;&lt;/b&gt;&apos;);
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
