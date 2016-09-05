@extends('layouts.app')

@section('title', 'Save a Place')

@section('content')
    <h1>Save a Place</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        // When you add a marker using a Place instead of a location, the Maps
        // API will automatically add a 'Save to Google Maps' link to any info
        // window associated with that marker.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: {lat: -33.8666, lng: 151.1958}
            });

            var marker = new google.maps.Marker({
                map: map,

                // Define the place with a location, and a query string.
                place: {
                    location: {lat: -33.8666, lng: 151.1958},
                    query: 'Google, Sydney, Australia'
                },

                // Attributions help users find your site again.
                attribution: {
                    source: 'Google Maps JavaScript API',
                    webUrl: 'https://developers.google.com/maps/'
                }
            });

            // Construct a new InfoWindow.
            var infoWindow = new google.maps.InfoWindow({
                content: 'Google Sydney'
            });

            // Opens the InfoWindow when marker is clicked.
            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&signed_in=true&callback=initMap"></script>
@endpush
