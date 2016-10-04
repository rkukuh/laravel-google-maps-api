@extends('layouts.app')

@section('title', 'Distance Matrix')

@section('content')
    <h1>Distance Matrix</h1>

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
