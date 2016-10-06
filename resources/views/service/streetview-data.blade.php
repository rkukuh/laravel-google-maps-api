@extends('layouts.app')

@section('title', 'Accessing street view data')

@section('content')
    <h1>Accessing street view data</h1>

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
