@extends('layouts.app')

@section('title', 'Place detail')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Place detail
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
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.866, lng: 151.196},
                zoom: 15
            });

            var infowindow  = new google.maps.InfoWindow();
            var service     = new google.maps.places.PlacesService(map);

            service.getDetails({
                placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
            },
            function(place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: place.geometry.location
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                                              'Place ID: ' + place.place_id + '<br>' +
                                              place.formatted_address + '</div>');

                        infowindow.open(map, this);
                    });
                }
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=places&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=places&quot;&gt;

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: {lat: -33.866, lng: 151.196},
                zoom: 15
            });

            var infowindow  = new google.maps.InfoWindow();
            var service     = new google.maps.places.PlacesService(map);

            service.getDetails({
                placeId: &apos;ChIJN1t_tDeuEmsRUsoyG83frY4&apos;
            },
            function(place, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: place.geometry.location
                    });

                    google.maps.event.addListener(marker, &apos;click&apos;, function() {
                        infowindow.setContent(&apos;&lt;div&gt;&lt;strong&gt;&apos; + place.name + &apos;&lt;/strong&gt;&lt;br&gt;&apos; +
                                              &apos;Place ID: &apos; + place.place_id + &apos;&lt;br&gt;&apos; +
                                              place.formatted_address + &apos;&lt;/div&gt;&apos;);

                        infowindow.open(map, this);
                    });
                }
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;libraries=places&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
