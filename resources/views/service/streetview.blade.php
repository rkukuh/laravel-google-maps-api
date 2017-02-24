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
                position    : {lat: -7.2459509, lng: 112.7386515},
                pov         : {heading: 165, pitch: 0},
                zoom        : 1
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initialize"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var panorama;

        function initialize() {
            panorama = new google.maps.StreetViewPanorama(
                document.getElementById(&apos;street-view&apos;),
            {
                position    : {lat: -7.2459509, lng: 112.7386515},
                pov         : {heading: 165, pitch: 0},
                zoom        : 1
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initialize&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #street-view { height: 500px; }
@endsection

@section('source-code-html')
    &lt;div id=&quot;street-view&quot;&gt;&lt;/div&gt;
@endsection
