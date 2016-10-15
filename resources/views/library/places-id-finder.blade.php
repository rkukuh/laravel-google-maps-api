@extends('layouts.app')

@section('title', 'PlaceID Finder')

@section('content')
    <h1>PlaceID Finder</h1>

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
