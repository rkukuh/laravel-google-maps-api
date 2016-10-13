@extends('layouts.app')

@section('title', 'Autocomplete address form')

@section('content')
    <h1>Autocomplete address form</h1>

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
