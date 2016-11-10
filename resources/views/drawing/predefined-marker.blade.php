@extends('layouts.app')

@section('title', 'Predefined markers')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Predefined markers
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
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            var marker = new google.maps.Marker({
                position: map.getCenter(),
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 30
                },
                draggable: true,
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
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            var marker = new google.maps.Marker({
                position: map.getCenter(),
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 30
                },
                draggable: true,
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
