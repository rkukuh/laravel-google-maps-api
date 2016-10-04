@extends('layouts.app')

@section('title', 'Distance Matrix')

@section('content')
    <h1>Distance Matrix</h1>

    <div id="map"></div>

    <div id="right-panel">
        <div id="inputs">
            <pre>
                var origin1 = {lat: 55.930, lng: -3.118};
                var origin2 = 'Greenwich, England';
                var destinationA = 'Stockholm, Sweden';
                var destinationB = {lat: 50.087, lng: 14.421};
            </pre>
        </div>

        <div>
            <strong>Results</strong>
        </div>

        <div id="output"></div>
    </div>
@endsection

@push('css')
    <style>
        #map {
            height: 500px;
            width: 55%;
            float: left;
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
            width: 45%;
            padding-left: 2%;
        }

        #output {
            font-size: 11px;
        }
    </style>
@endpush

@push('js')
    <script>
        //
    </script>

    //
@endpush
