@extends('layouts.app')

@section('title', 'Draggable direction')

@section('content')
    <h1>Draggable direction</h1>

    <div id="map"></div>

    <div id="right-panel">
        <p>Total Distance: <span id="total"></span></p>
    </div>
@endsection

@push('css')
    <style>
        #map {
            float: left;
            width: 63%;
            height: 500px;
        }

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        #right-panel {
            float: right;
            width: 34%;
            height: 100%;
        }
        .panel {
            height: 100%;
            overflow: auto;
        }
    </style>
@endpush

@push('js')
    <script>
        //
    </script>

    //
@endpush
