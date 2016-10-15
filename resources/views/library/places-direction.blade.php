@extends('layouts.app')

@section('title', 'Places: Direction')

@section('content')
    <h1>Places: Direction</h1>

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
