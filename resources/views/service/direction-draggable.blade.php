@extends('layouts.app')

@section('title', 'Draggable direction')

@section('content')
    <h1>Draggable direction</h1>

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
