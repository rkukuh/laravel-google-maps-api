@extends('layouts.app')

@section('title', 'Custom controls')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom controls
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
        var map;
        var surabaya = {lat: -7.265757, lng: 112.734146};

        function CenterControl(controlDiv, map) {
            var controlUI = document.createElement('div');

            controlUI.style.backgroundColor = '#fff';
            controlUI.style.border = '2px solid #fff';
            controlUI.style.borderRadius = '3px';
            controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            controlUI.style.cursor = 'pointer';
            controlUI.style.marginBottom = '22px';
            controlUI.style.textAlign = 'center';
            controlUI.title = 'Click to recenter the map';
            controlDiv.appendChild(controlUI);

            var controlText = document.createElement('div');

            controlText.style.color = 'rgb(25,25,25)';
            controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
            controlText.style.fontSize = '16px';
            controlText.style.lineHeight = '38px';
            controlText.style.paddingLeft = '5px';
            controlText.style.paddingRight = '5px';
            controlText.innerHTML = 'Center Map';
            controlUI.appendChild(controlText);

            controlUI.addEventListener('click', function() {
                map.setCenter(surabaya);
            });
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: surabaya
            });

            var centerControlDiv = document.createElement('div');
            var centerControl = new CenterControl(centerControlDiv, map);

            centerControlDiv.index = 1;

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var map;
        var surabaya = {lat: -7.265757, lng: 112.734146};

        /**
        * The CenterControl adds a control to the map that recenters the map on
        * Chicago.
        * This constructor takes the control DIV as an argument.
        * @constructor
        */
        function CenterControl(controlDiv, map) {
            // Set CSS for the control border.
            var controlUI = document.createElement(&apos;div&apos;);

            controlUI.style.backgroundColor = &apos;#fff&apos;;
            controlUI.style.border = &apos;2px solid #fff&apos;;
            controlUI.style.borderRadius = &apos;3px&apos;;
            controlUI.style.boxShadow = &apos;0 2px 6px rgba(0,0,0,.3)&apos;;
            controlUI.style.cursor = &apos;pointer&apos;;
            controlUI.style.marginBottom = &apos;22px&apos;;
            controlUI.style.textAlign = &apos;center&apos;;
            controlUI.title = &apos;Click to recenter the map&apos;;
            controlDiv.appendChild(controlUI);

            // Set CSS for the control interior.
            var controlText = document.createElement(&apos;div&apos;);

            controlText.style.color = &apos;rgb(25,25,25)&apos;;
            controlText.style.fontFamily = &apos;Roboto,Arial,sans-serif&apos;;
            controlText.style.fontSize = &apos;16px&apos;;
            controlText.style.lineHeight = &apos;38px&apos;;
            controlText.style.paddingLeft = &apos;5px&apos;;
            controlText.style.paddingRight = &apos;5px&apos;;
            controlText.innerHTML = &apos;Center Map&apos;;
            controlUI.appendChild(controlText);

            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener(&apos;click&apos;, function() {
                map.setCenter(surabaya);
            });
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom: 10,
                center: surabaya
            });

            // Create the DIV to hold the control and call the CenterControl()
            // constructor passing in this DIV.
            var centerControlDiv = document.createElement(&apos;div&apos;);
            var centerControl = new CenterControl(centerControlDiv, map);

            centerControlDiv.index = 1;

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
