@extends('layouts.app')

@section('title', 'Places search pagination')

@section('content')
    <h1>Place search pagination</h1>

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
