@extends('layouts.app')

@section('title', 'Street View controls')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Street View controls
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
        function initPano() {
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('map'), {
                    position: {lat: -7.2459509, lng: 112.7386515},
                    addressControlOptions: {
                        position: google.maps.ControlPosition.BOTTOM_CENTER
                    },
                    linksControl: false,
                    panControl: false,
                    enableCloseButton: false
                }
            );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initPano"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initPano() {
            // Note: constructed panorama objects have visible: true
            // set by default.
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById(&apos;map&apos;), {
                    position: {lat: -7.2459509, lng: 112.7386515},
                    addressControlOptions: {
                        position: google.maps.ControlPosition.BOTTOM_CENTER
                    },
                    linksControl: false,
                    panControl: false,
                    enableCloseButton: false
                }
            );
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initPano&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
