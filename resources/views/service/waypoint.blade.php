@extends('layouts.app')

@section('title', 'Waypoints in direction')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Waypoints in direction
    </h1>

    <div id="map"></div>

    <div id="right-panel">
        <div>
            <b>Start:</b>
            <select id="start">
                <option value="Halifax, NS">Halifax, NS</option>
                <option value="Boston, MA">Boston, MA</option>
                <option value="New York, NY">New York, NY</option>
                <option value="Miami, FL">Miami, FL</option>
            </select>
            <br>

            <b>Waypoints:</b> <br>
            <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br>
            <select multiple id="waypoints">
                <option value="montreal, quebec">Montreal, QBC</option>
                <option value="toronto, ont">Toronto, ONT</option>
                <option value="chicago, il">Chicago</option>
                <option value="winnipeg, mb">Winnipeg</option>
                <option value="fargo, nd">Fargo</option>
                <option value="calgary, ab">Calgary</option>
                <option value="spokane, wa">Spokane</option>
            </select>
            <br>

            <b>End:</b>
            <select id="end">
                <option value="Vancouver, BC">Vancouver, BC</option>
                <option value="Seattle, WA">Seattle, WA</option>
                <option value="San Francisco, CA">San Francisco, CA</option>
                <option value="Los Angeles, CA">Los Angeles, CA</option>
            </select>
            <br>

            <input type="submit" id="submit">
        </div>

        <div id="directions-panel"></div>
    </div>
@endsection

@push('css')
    <style>
        #map {
            float: left;
            width: 70%;
            height: 500px;
        }

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            margin: 20px;
            border-width: 2px;
            width: 25%;
            height: 400px;
            float: left;
            text-align: left;
            padding-top: 0;
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

        #directions-panel {
            margin-top: 10px;
            background-color: #FFEE77;
            padding: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 6,
                center  : {lat: 41.85, lng: -87.65}
            });

            directionsDisplay.setMap(map);

            document.getElementById('submit').addEventListener('click', function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var waypts = [];
            var checkboxArray = document.getElementById('waypoints');

            for (var i = 0; i < checkboxArray.length; i++) {
                if (checkboxArray.options[i].selected) {
                    waypts.push({
                        location: checkboxArray[i].value,
                        stopover: true
                    });
                }
            }

            directionsService.route({
                origin              : document.getElementById('start').value,
                destination         : document.getElementById('end').value,
                waypoints           : waypts,
                optimizeWaypoints   : true,
                travelMode          : 'DRIVING'
            },
            function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);

                    var route = response.routes[0];
                    var summaryPanel = document.getElementById('directions-panel');

                    summaryPanel.innerHTML = '';

                    for (var i = 0; i < route.legs.length; i++) {
                        var routeSegment = i + 1;
                        summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment + '</b><br>';
                        summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                        summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                        summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                    }
                }
                else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 6,
                center  : {lat: 41.85, lng: -87.65}
            });

            directionsDisplay.setMap(map);

            document.getElementById(&apos;submit&apos;).addEventListener(&apos;click&apos;, function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var waypts = [];
            var checkboxArray = document.getElementById(&apos;waypoints&apos;);

            for (var i = 0; i &lt; checkboxArray.length; i++) {
                if (checkboxArray.options[i].selected) {
                    waypts.push({
                        location: checkboxArray[i].value,
                        stopover: true
                    });
                }
            }

            directionsService.route({
                origin              : document.getElementById(&apos;start&apos;).value,
                destination         : document.getElementById(&apos;end&apos;).value,
                waypoints           : waypts,
                optimizeWaypoints   : true,
                travelMode          : &apos;DRIVING&apos;
            },
            function(response, status) {
                if (status === &apos;OK&apos;) {
                    directionsDisplay.setDirections(response);

                    var route = response.routes[0];
                    var summaryPanel = document.getElementById(&apos;directions-panel&apos;);

                    summaryPanel.innerHTML = &apos;&apos;;

                    // For each route, display summary information.
                    for (var i = 0; i &lt; route.legs.length; i++) {
                        var routeSegment = i + 1;
                        summaryPanel.innerHTML += &apos;&lt;b&gt;Route Segment: &apos; + routeSegment + &apos;&lt;/b&gt;&lt;br&gt;&apos;;
                        summaryPanel.innerHTML += route.legs[i].start_address + &apos; to &apos;;
                        summaryPanel.innerHTML += route.legs[i].end_address + &apos;&lt;br&gt;&apos;;
                        summaryPanel.innerHTML += route.legs[i].distance.text + &apos;&lt;br&gt;&lt;br&gt;&apos;;
                    }
                }
                else {
                    window.alert(&apos;Directions request failed due to &apos; + status);
                }
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $server_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map {
        float: left;
        width: 70%;
        height: 500px;
    }

    #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
        margin: 20px;
        border-width: 2px;
        width: 25%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
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

    #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
    }
@endsection

@section('source-code-html')

    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;

    &lt;div id=&quot;right-panel&quot;&gt;
        &lt;div&gt;
            &lt;b&gt;Start:&lt;/b&gt;
            &lt;select id=&quot;start&quot;&gt;
                &lt;option value=&quot;Halifax, NS&quot;&gt;Halifax, NS&lt;/option&gt;
                &lt;option value=&quot;Boston, MA&quot;&gt;Boston, MA&lt;/option&gt;
                &lt;option value=&quot;New York, NY&quot;&gt;New York, NY&lt;/option&gt;
                &lt;option value=&quot;Miami, FL&quot;&gt;Miami, FL&lt;/option&gt;
            &lt;/select&gt;
            &lt;br&gt;

            &lt;b&gt;Waypoints:&lt;/b&gt; &lt;br&gt;
            &lt;i&gt;(Ctrl+Click or Cmd+Click for multiple selection)&lt;/i&gt; &lt;br&gt;
            &lt;select multiple id=&quot;waypoints&quot;&gt;
                &lt;option value=&quot;montreal, quebec&quot;&gt;Montreal, QBC&lt;/option&gt;
                &lt;option value=&quot;toronto, ont&quot;&gt;Toronto, ONT&lt;/option&gt;
                &lt;option value=&quot;chicago, il&quot;&gt;Chicago&lt;/option&gt;
                &lt;option value=&quot;winnipeg, mb&quot;&gt;Winnipeg&lt;/option&gt;
                &lt;option value=&quot;fargo, nd&quot;&gt;Fargo&lt;/option&gt;
                &lt;option value=&quot;calgary, ab&quot;&gt;Calgary&lt;/option&gt;
                &lt;option value=&quot;spokane, wa&quot;&gt;Spokane&lt;/option&gt;
            &lt;/select&gt;
            &lt;br&gt;

            &lt;b&gt;End:&lt;/b&gt;
            &lt;select id=&quot;end&quot;&gt;
                &lt;option value=&quot;Vancouver, BC&quot;&gt;Vancouver, BC&lt;/option&gt;
                &lt;option value=&quot;Seattle, WA&quot;&gt;Seattle, WA&lt;/option&gt;
                &lt;option value=&quot;San Francisco, CA&quot;&gt;San Francisco, CA&lt;/option&gt;
                &lt;option value=&quot;Los Angeles, CA&quot;&gt;Los Angeles, CA&lt;/option&gt;
            &lt;/select&gt;
            &lt;br&gt;

            &lt;input type=&quot;submit&quot; id=&quot;submit&quot;&gt;
        &lt;/div&gt;

        &lt;div id=&quot;directions-panel&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;
@endsection
