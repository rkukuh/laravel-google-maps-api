@extends('layouts.app')

@section('title', 'Simple Map')

@section('content')
    <h1>
        <button type="button" class="btn btn-primary"
                data-toggle="modal" data-target="#source_code">
            <strong>&lt;/&gt;</strong>
        </button>

        Simple Map
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
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 10
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
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 10
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
