@extends('layouts.app')

@section('title', 'Showing elevation along path')

@section('content')
    <h1>Showing elevation along path</h1>

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
