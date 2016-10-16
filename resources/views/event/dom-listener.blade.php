@extends('layouts.app')

@section('title', 'Listening to DOM events')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Listening to DOM events
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
            var mapDiv = document.getElementById('map');

            var map = new google.maps.Map(mapDiv, {
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 8
            });

            google.maps.event.addDomListener(mapDiv, 'click', function() {
                window.alert('Map was clicked!');
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var mapDiv = document.getElementById(&apos;map&apos;);

            var map = new google.maps.Map(mapDiv, {
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 8
            });

            google.maps.event.addDomListener(mapDiv, &apos;click&apos;, function() {
                window.alert(&apos;Map was clicked!&apos;);
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
