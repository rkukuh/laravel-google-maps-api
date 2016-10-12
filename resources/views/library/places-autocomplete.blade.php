@extends('layouts.app')

@section('title', 'Places: Autocomplete')

@section('content')
    <h1>Places: Autocomplete</h1>

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
