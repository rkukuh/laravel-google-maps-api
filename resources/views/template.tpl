@extends('layouts.app')

@section('title', '')

@section('content')
    <h1>
        @include('_shared.button-source-code')
    </h1>

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
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        //
    &lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
