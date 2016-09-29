@extends('layouts.app')

@section('title', 'Waypoints in direction')

@section('content')
    <h1>Waypoints in direction</h1>

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
