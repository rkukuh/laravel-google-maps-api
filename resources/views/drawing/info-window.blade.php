@extends('layouts.app')

@section('title', 'Info window')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Info window
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
        // This example displays a marker at the center of Australia.
        // When the user clicks the marker, an info window opens.

        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 4,
                center  : uluru
            });

            var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                '<div id="bodyContent">'+
                '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                'sandstone rock formation in the southern part of the '+
                'Northern Territory, central Australia.</p>'+
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                '(last visited June 22, 2009).</p>'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position    : uluru,
                map         : map,
                title       : 'Uluru (Ayers Rock)'
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
