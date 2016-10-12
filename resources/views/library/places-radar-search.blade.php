@extends('layouts.app')

@section('title', 'Search 200 places with Radar Search')

@section('content')
    <h1>Search 200 places with Radar Search</h1>

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
