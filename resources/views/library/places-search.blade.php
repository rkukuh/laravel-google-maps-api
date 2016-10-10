@extends('layouts.app')

@section('title', 'Places: Search')

@section('content')
    <h1>Places: Search</h1>

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
