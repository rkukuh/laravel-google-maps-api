@extends('layouts.app')

@section('title', 'Distance Matrix')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Distance Matrix
    </h1>

    <div id="map"></div>

    <div id="right-panel">
        <div id="inputs">
            var origin1 = {lat: 55.930, lng: -3.118};<br>
            var origin2 = 'Greenwich, England';<br>
            var destinationA = 'Stockholm, Sweden';<br>
            var destinationB = {lat: 50.087, lng: 14.421};
        </div>

        <div style="margin-top: 20px;">
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
            padding-left: 20px;
            float: right;
            width: 45%;
            overflow: scroll;
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
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var bounds       = new google.maps.LatLngBounds;
            var markersArray = [];

            var origin1      = {lat: 55.93, lng: -3.118};
            var origin2      = 'Greenwich, England';
            var destinationA = 'Stockholm, Sweden';
            var destinationB = {lat: 50.087, lng: 14.421};

            var destinationIcon = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=D|FF0000|000000';
            var originIcon      = 'https://chart.googleapis.com/chart?' + 'chst=d_map_pin_letter&chld=O|FFFF00|000000';

            var map = new google.maps.Map(document.getElementById('map'), {
                center  : {lat: 55.53, lng: 9.4},
                zoom    : 10
            });

            var geocoder = new google.maps.Geocoder;
            var service  = new google.maps.DistanceMatrixService;

            service.getDistanceMatrix({
                origins         : [origin1, origin2],
                destinations    : [destinationA, destinationB],
                travelMode      : 'DRIVING',
                unitSystem      : google.maps.UnitSystem.METRIC,
                avoidHighways   : false,
                avoidTolls  : false
            },
            function(response, status) {
                if (status !== 'OK') {
                    alert('Error was: ' + status);
                }
                else {
                    var originList      = response.originAddresses;
                    var destinationList = response.destinationAddresses;
                    var outputDiv       = document.getElementById('output');
                    outputDiv.innerHTML = '';

                    deleteMarkers(markersArray);

                    var showGeocodedAddressOnMap = function(asDestination) {
                        var icon = asDestination ? destinationIcon : originIcon;

                        return function(results, status) {
                            if (status === 'OK') {
                                map.fitBounds(bounds.extend(results[0].geometry.location));

                                markersArray.push(new google.maps.Marker({
                                    map     : map,
                                    position: results[0].geometry.location,
                                    icon    : icon
                                }));
                            }
                            else {
                                alert('Geocode was not successful due to: ' + status);
                            }
                        };
                    };

                    for (var i = 0; i < originList.length; i++) {
                        var results = response.rows[i].elements;

                        geocoder.geocode(
                            {'address': originList[i]},
                            showGeocodedAddressOnMap(false)
                        );

                        for (var j = 0; j < results.length; j++) {
                            geocoder.geocode(
                                {'address': destinationList[j]},
                                showGeocodedAddressOnMap(true)
                            );

                            outputDiv.innerHTML += originList[i] +
                                                    ' to ' + destinationList[j] +
                                                    ': ' + results[j].distance.text + ' in ' +
                                                    results[j].duration.text + '<br>';
                        }
                    }
                }
            });
        }

        function deleteMarkers(markersArray) {
            for (var i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(null);
            }

            markersArray = [];
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var bounds       = new google.maps.LatLngBounds;
            var markersArray = [];

            var origin1      = {lat: 55.93, lng: -3.118};
            var origin2      = &apos;Greenwich, England&apos;;
            var destinationA = &apos;Stockholm, Sweden&apos;;
            var destinationB = {lat: 50.087, lng: 14.421};

            var destinationIcon = &apos;https://chart.googleapis.com/chart?&apos; + &apos;chst=d_map_pin_letter&amp;chld=D|FF0000|000000&apos;;
            var originIcon      = &apos;https://chart.googleapis.com/chart?&apos; + &apos;chst=d_map_pin_letter&amp;chld=O|FFFF00|000000&apos;;

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center  : {lat: 55.53, lng: 9.4},
                zoom    : 10
            });

            var geocoder = new google.maps.Geocoder;
            var service  = new google.maps.DistanceMatrixService;

            service.getDistanceMatrix({
                origins         : [origin1, origin2],
                destinations    : [destinationA, destinationB],
                travelMode      : &apos;DRIVING&apos;,
                unitSystem      : google.maps.UnitSystem.METRIC,
                avoidHighways   : false,
                avoidTolls  : false
            },
            function(response, status) {
                if (status !== &apos;OK&apos;) {
                    alert(&apos;Error was: &apos; + status);
                }
                else {
                    var originList      = response.originAddresses;
                    var destinationList = response.destinationAddresses;
                    var outputDiv       = document.getElementById(&apos;output&apos;);
                    outputDiv.innerHTML = &apos;&apos;;

                    deleteMarkers(markersArray);

                    var showGeocodedAddressOnMap = function(asDestination) {
                        var icon = asDestination ? destinationIcon : originIcon;

                        return function(results, status) {
                            if (status === &apos;OK&apos;) {
                                map.fitBounds(bounds.extend(results[0].geometry.location));

                                markersArray.push(new google.maps.Marker({
                                    map     : map,
                                    position: results[0].geometry.location,
                                    icon    : icon
                                }));
                            }
                            else {
                                alert(&apos;Geocode was not successful due to: &apos; + status);
                            }
                        };
                    };

                    for (var i = 0; i &lt; originList.length; i++) {
                        var results = response.rows[i].elements;

                        geocoder.geocode(
                            {&apos;address&apos;: originList[i]},
                            showGeocodedAddressOnMap(false)
                        );

                        for (var j = 0; j &lt; results.length; j++) {
                            geocoder.geocode(
                                {&apos;address&apos;: destinationList[j]},
                                showGeocodedAddressOnMap(true)
                            );

                            outputDiv.innerHTML += originList[i] +
                                                    &apos; to &apos; + destinationList[j] +
                                                    &apos;: &apos; + results[j].distance.text + &apos; in &apos; +
                                                    results[j].duration.text + &apos;&lt;br&gt;&apos;;
                        }
                    }
                }
            });
        }

        function deleteMarkers(markersArray) {
            for (var i = 0; i &lt; markersArray.length; i++) {
                markersArray[i].setMap(null);
            }

            markersArray = [];
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $server_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map {
        height: 500px;
        width: 55%;
        float: left;
    }

    #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 20px;
        float: right;
        width: 45%;
        overflow: scroll;
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
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
