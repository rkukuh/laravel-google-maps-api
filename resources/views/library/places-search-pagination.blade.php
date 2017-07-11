@extends('layouts.app')

@section('title', 'Places search pagination')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Place search pagination
    </h1>

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
            position: absolute;
            right: 65px;
            top: 60%;
            margin-top: -195px;
            padding: 5px;
            border: 1px solid red;
            background: #fff;
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
        var map;

        function initMap() {
            var surabaya = {lat: -7.265757, lng: 112.734146};

            map = new google.maps.Map(document.getElementById('map'), {
                center: surabaya,
                zoom: 17
            });

            var service = new google.maps.places.PlacesService(map);

            service.nearbySearch({
                    location: surabaya,
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

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=places&quot;&gt;

        var map;

        function initMap() {
            var surabaya = {lat: -7.265757, lng: 112.734146};

            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: surabaya,
                zoom: 17
            });

            var service = new google.maps.places.PlacesService(map);

            service.nearbySearch({
                    location: surabaya,
                    radius: 500,
                    type: [&apos;store&apos;]
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
                    var moreButton = document.getElementById(&apos;more&apos;);

                    moreButton.disabled = false;

                    moreButton.addEventListener(&apos;click&apos;, function() {
                        moreButton.disabled = true;
                        pagination.nextPage();
                    });
                }
            }
        }

        function createMarkers(places) {
            var bounds      = new google.maps.LatLngBounds();
            var placesList  = document.getElementById(&apos;places&apos;);

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

                placesList.innerHTML += &apos;&lt;li&gt;&apos; + place.name + &apos;&lt;/li&gt;&apos;;

                bounds.extend(place.geometry.location);
            }

            map.fitBounds(bounds);
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;libraries=places&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map { height: 500px; }

    #right-panel {
        font-family: 'Roboto','sans-serif';
        position: absolute;
        right: 65px;
        top: 60%;
        margin-top: -195px;
        padding: 5px;
        border: 1px solid red;
        background: #fff;
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
@endsection

@section('source-code-html')

    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;

    &lt;div id=&quot;right-panel&quot;&gt;
        &lt;h2&gt;Results&lt;/h2&gt;
        &lt;ul id=&quot;places&quot;&gt;&lt;/ul&gt;
        &lt;button id=&quot;more&quot;&gt;More results&lt;/button&gt;
    &lt;/div&gt;
@endsection
