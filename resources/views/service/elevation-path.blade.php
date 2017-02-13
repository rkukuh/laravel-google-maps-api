@extends('layouts.app')

@section('title', 'Showing elevation along path')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Showing elevation along path
    </h1>

    <div id="map"></div>
    <div id="elevation_chart"></div>
@endsection

@push('css')
    <style>
        #map { height: 350px; }
    </style>
@endpush

@push('js')
    <script src="https://www.google.com/jsapi"></script>

    <script>
        google.load('visualization', '1', {packages: ['columnchart']});

        function initMap() {
            var path = [
                {lat: 36.579, lng: -118.292},
                {lat: 36.606, lng: -118.0638},
                {lat: 36.433, lng: -117.951},
                {lat: 36.588, lng: -116.943},
                {lat: 36.34, lng: -117.468},
                {lat: 36.24, lng: -116.832}
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 8,
                center      : path[1],
                mapTypeId   : 'terrain'
            });

            var elevator = new google.maps.ElevationService;

            displayPathElevation(path, elevator, map);
        }

        function displayPathElevation(path, elevator, map) {
            new google.maps.Polyline({
                path        : path,
                strokeColor : '#0000CC',
                opacity     : 0.4,
                map         : map
            });

            elevator.getElevationAlongPath({
                'path'      : path,
                'samples'   : 256
            }, plotElevation);
        }

        function plotElevation(elevations, status) {
            var chartDiv = document.getElementById('elevation_chart');

            if (status !== 'OK') {
                chartDiv.innerHTML = 'Cannot show elevation: request failed because ' + status;

                return;
            }

            var chart = new google.visualization.ColumnChart(chartDiv);

            var data = new google.visualization.DataTable();

            data.addColumn('string', 'Sample');
            data.addColumn('number', 'Elevation');

            for (var i = 0; i < elevations.length; i++) {
                data.addRow(['', elevations[i].elevation]);
            }

            chart.draw(data, {
                height: 150,
                legend: 'none',
                titleY: 'Elevation (m)'
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script src=&quot;https://www.google.com/jsapi&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        // Load the Visualization API and the columnchart package.
        google.load(&apos;visualization&apos;, &apos;1&apos;, {packages: [&apos;columnchart&apos;]});

        function initMap() {
            // The following path marks a path from Mt. Whitney, the highest point in the
            // continental United States to Badwater, Death Valley, the lowest point.
            var path = [
                {lat: 36.579, lng: -118.292},  // Mt. Whitney
                {lat: 36.606, lng: -118.0638}, // Lone Pine
                {lat: 36.433, lng: -117.951},  // Owens Lake
                {lat: 36.588, lng: -116.943},  // Beatty Junction
                {lat: 36.34, lng: -117.468},   // Panama Mint Springs
                {lat: 36.24, lng: -116.832}
            ];  // Badwater, Death Valley

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 8,
                center      : path[1],
                mapTypeId   : &apos;terrain&apos;
            });

            // Create an ElevationService.
            var elevator = new google.maps.ElevationService;

            // Draw the path, using the Visualization API and the Elevation service.
            displayPathElevation(path, elevator, map);
        }

        function displayPathElevation(path, elevator, map) {
            // Display a polyline of the elevation path.
            new google.maps.Polyline({
                path        : path,
                strokeColor : &apos;#0000CC&apos;,
                opacity     : 0.4,
                map         : map
            });

            // Create a PathElevationRequest object using this array.
            // Ask for 256 samples along that path.
            // Initiate the path request.
            elevator.getElevationAlongPath({
                &apos;path&apos;      : path,
                &apos;samples&apos;   : 256
            }, plotElevation);
        }

        // Takes an array of ElevationResult objects, draws the path on the map
        // and plots the elevation profile on a Visualization API ColumnChart.
        function plotElevation(elevations, status) {
            var chartDiv = document.getElementById(&apos;elevation_chart&apos;);

            if (status !== &apos;OK&apos;) {
                // Show the error code inside the chartDiv.
                chartDiv.innerHTML = &apos;Cannot show elevation: request failed because &apos; + status;
                
                return;
            }

            // Create a new chart in the elevation_chart DIV.
            var chart = new google.visualization.ColumnChart(chartDiv);

            // Extract the data from which to populate the chart.
            // Because the samples are equidistant, the &apos;Sample&apos;
            // column here does double duty as distance along the
            // X axis.
            var data = new google.visualization.DataTable();

            data.addColumn(&apos;string&apos;, &apos;Sample&apos;);
            data.addColumn(&apos;number&apos;, &apos;Elevation&apos;);

            for (var i = 0; i &lt; elevations.length; i++) {
                data.addRow([&apos;&apos;, elevations[i].elevation]);
            }

            // Draw the chart using the data within its DIV.
            chart.draw(data, {
                height: 150,
                legend: &apos;none&apos;,
                titleY: &apos;Elevation (m)&apos;
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $server_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
