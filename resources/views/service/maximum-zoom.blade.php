@extends('layouts.app')

@section('title', 'Maximum zoom imagery')

@section('content')
    <h1>Maximum zoom imagery</h1>

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
