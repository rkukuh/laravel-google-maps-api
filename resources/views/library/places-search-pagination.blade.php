@extends('layouts.app')

@section('title', 'Places search pagination')

@section('content')
    <h1>Place search pagination</h1>

    <div id="map"></div>

    <div id="right-panel">
        <h2>Results</h2>
        <ul id="places"></ul>
        <button id="more">More results</button>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

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
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            right: 5px;
            top: 60%;
            margin-top: -195px;
            height: 330px;
            width: 200px;
            padding: 5px;
            z-index: 5;
            border: 1px solid #999;
            background: #fff;
        }

        #right-panel h2 {
            font-size: 22px;
            margin: 0 0 5px 0;
        }

        #right-panel ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            height: 271px;
            width: 200px;
            overflow-y: scroll;
        }

        #right-panel li {
            background-color: #f1f1f1;
            padding: 10px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        #right-panel li:nth-child(odd) {
            background-color: #fcfcfc;
        }

        #more {
            width: 100%;
            margin: 5px 0 0 0;
        }
    </style>
@endpush

@push('js')
    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var map;

        function initMap() {
            var pyrmont = {lat: -33.866, lng: 151.196};

            map = new google.maps.Map(document.getElementById('map'), {
                center: pyrmont,
                zoom: 17
            });

            var service = new google.maps.places.PlacesService(map);

            service.nearbySearch({
                    location: pyrmont,
                    radius: 500,
                    type: ['store']
                },
                processResults
            );
        }

        function processResults(results, status, pagination) {
            if (status !== google.maps.places.PlacesServiceStatus.OK) {
                return;
            }
            else {
                createMarkers(results);

                if (pagination.hasNextPage) {
                    var moreButton = document.getElementById('more');

                    moreButton.disabled = false;

                    moreButton.addEventListener('click', function() {
                        moreButton.disabled = true;
                        pagination.nextPage();
                    });
                }
            }
        }

        function createMarkers(places) {
            var bounds      = new google.maps.LatLngBounds();
            var placesList  = document.getElementById('places');

            for (var i = 0, place; place = places[i]; i++) {
                var image = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                var marker = new google.maps.Marker({
                    map: map,
                    icon: image,
                    title: place.name,
                    position: place.geometry.location
                });

                placesList.innerHTML += '<li>' + place.name + '</li>';

                bounds.extend(place.geometry.location);
            }

            map.fitBounds(bounds);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=places&callback=initMap"></script>
@endpush