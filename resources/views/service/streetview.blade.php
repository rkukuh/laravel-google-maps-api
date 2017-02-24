@extends('layouts.app')

@section('title', 'Street View container')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Street View container
    </h1>

    <div id="street-view"></div>
@endsection

@push('css')
    <style>
        #street-view { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        var panorama;

        function initialize() {
            panorama = new google.maps.StreetViewPanorama(
                document.getElementById('street-view'),
            {
                position    : {lat: 37.869260, lng: -122.254811},
                pov         : {heading: 165, pitch: 0},
                zoom        : 1
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initialize"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        //
    &lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
