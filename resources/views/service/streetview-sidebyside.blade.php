@extends('layouts.app')

@section('title', 'Street View side-by-side')

@section('content')
    <h1>Street View side-by-side</h1>

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
