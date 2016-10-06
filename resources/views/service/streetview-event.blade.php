@extends('layouts.app')

@section('title', 'Street View events')

@section('content')
    <h1>Street View events</h1>

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
