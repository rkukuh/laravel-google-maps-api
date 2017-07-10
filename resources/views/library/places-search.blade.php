@extends('layouts.app')

@section('title', 'Places: Search')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Places: Search
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
        var infowindow;

        function initMap() {
            var surabaya = {lat: -7.265757, lng: 112.734146};

            map = new google.maps.Map(document.getElementById('map'), {
                center: surabaya,
                zoom: 15
            });

            infowindow = new google.maps.InfoWindow();

            var service = new google.maps.places.PlacesService(map);

            service.nearbySearch({
                    location: surabaya,
                    radius: 500,
                    type: ['store']
                },
                callback
            );
        }

        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        function createMarker(place) {
            var placeLoc = place.geometry.location;

            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=places&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=places&quot;&gt;

        var map;
        var infowindow;

        function initMap() {
            var pyrmont = {lat: -33.867, lng: 151.195};

            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: pyrmont,
                zoom: 15
            });

            infowindow = new google.maps.InfoWindow();

            var service = new google.maps.places.PlacesService(map);

            service.nearbySearch({
                    location: pyrmont,
                    radius: 500,
                    type: [&apos;store&apos;]
                },
                callback
            );
        }

        function callback(results, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i &lt; results.length; i++) {
                    createMarker(results[i]);
                }
            }
        }

        function createMarker(place) {
            var placeLoc = place.geometry.location;

            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            google.maps.event.addListener(marker, &apos;click&apos;, function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
    &lt;/script&gt;

    &lt;script async defer
    src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;libraries=places&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
