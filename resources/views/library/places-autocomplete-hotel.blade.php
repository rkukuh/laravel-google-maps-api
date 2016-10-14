@extends('layouts.app')

@section('title', 'Autocomplete hotel search')

@section('content')
    <h1>Autocomplete hotel search</h1>

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
