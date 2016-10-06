@extends('layouts.app')

@section('title', 'Overlays within street view')

@section('content')
    <h1>Overlays within street view</h1>

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
