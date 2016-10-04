@extends('layouts.app')

@section('title', 'Elevation service')

@section('content')
    <h1>Elevation service</h1>

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
