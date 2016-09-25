@extends('layouts.app')

@section('title', 'Geocoding Component Restriction')

@section('content')
    <h1>Geocoding Component Restriction</h1>

    <div id="map"></div>

    <div id="floating-panel">
        <pre>componentRestrictions: {country: "AU", postalCode: "2000"}</pre>
        <button id="submit">Geocode</button>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 90px;
            left: 35%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder;
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 8,
                center  : {lat: -33.865, lng: 151.209}
            });

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, map) {
            geocoder.geocode({
                    componentRestrictions: {
                        country     : 'AU',
                        postalCode  : '2000'
                    }
                },
                function(results, status) {
                    if (status === 'OK') {
                        map.setCenter(results[0].geometry.location);

                        new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    }
                    else {
                        window.alert('Geocode was not successful for the following reason: ' + status);
                    }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $server_key }}&callback=initMap"></script>
@endpush
