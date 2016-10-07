@extends('layouts.app')

@section('title', 'Custom street view panorama tiles')

@section('content')
    <h1>Custom street view panorama tiles</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        //
    </script>

    //
@endpush
