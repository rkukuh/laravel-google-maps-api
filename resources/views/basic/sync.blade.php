@extends('layouts.app')

@section('title', 'Synchronous Loading')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Synchronous Loading
    </h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}"></script>

    <script>
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -7.265757, lng: 112.734146},
            zoom: 10
        });
    </script>
@endpush

@section('source-code-javascript')

    &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
            center: {lat: -7.265757, lng: 112.734146},
            zoom: 10
        });
    &lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
