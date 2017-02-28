@extends('layouts.app')

@section('title', 'Accessing street view data')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Accessing street view data
    </h1>

    <div id="map"></div>
    <div id="pano"></div>
@endsection

@push('css')
    <style>
        #map, #pano {
            height: 500px;
            width: 50%;
            float: left;
        }
    </style>
@endpush

@push('js')
    <script>
        var map;
        var panorama;

        function initMap() {
            var surabaya = {lat: -7.2459509, lng: 112.7386515};
            var sv       = new google.maps.StreetViewService();

            panorama     = new google.maps.StreetViewPanorama(document.getElementById('pano'));

            map = new google.maps.Map(document.getElementById('map'), {
                center: surabaya,
                zoom: 16,
                streetViewControl: false
            });

            sv.getPanorama({location: surabaya, radius: 50}, processSVData);

            map.addListener('click', function(event) {
                sv.getPanorama({location: event.latLng, radius: 50}, processSVData);
            });
        }

        function processSVData(data, status) {
            if (status === 'OK') {
                var marker = new google.maps.Marker({
                    position: data.location.latLng,
                    map: map,
                    title: data.location.description
                });

                panorama.setPano(data.location.pano);

                panorama.setPov({
                    heading: 270,
                    pitch: 0
                });

                panorama.setVisible(true);

                marker.addListener('click', function() {
                    var markerPanoID = data.location.pano;

                    panorama.setPano(markerPanoID);
                    panorama.setPov({
                        heading: 270,
                        pitch: 0
                    });

                    panorama.setVisible(true);
                });
            }
            else {
                console.error('Street View data not found for this location.');
            }
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var map;
        var panorama;

        function initMap() {
            var surabaya = {lat: -7.2459509, lng: 112.7386515};
            var sv       = new google.maps.StreetViewService();

            panorama     = new google.maps.StreetViewPanorama(document.getElementById(&apos;pano&apos;));

            // Set up the map.
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: surabaya,
                zoom: 16,
                streetViewControl: false
            });

            // Set the initial Street View camera to the center of the map
            sv.getPanorama({location: surabaya, radius: 50}, processSVData);

            // Look for a nearby Street View panorama when the map is clicked.
            // getPanoramaByLocation will return the nearest pano when the
            // given radius is 50 meters or less.
            map.addListener(&apos;click&apos;, function(event) {
                sv.getPanorama({location: event.latLng, radius: 50}, processSVData);
            });
        }

        function processSVData(data, status) {
            if (status === &apos;OK&apos;) {
                var marker = new google.maps.Marker({
                    position: data.location.latLng,
                    map: map,
                    title: data.location.description
                });

                panorama.setPano(data.location.pano);

                panorama.setPov({
                    heading: 270,
                    pitch: 0
                });

                panorama.setVisible(true);

                marker.addListener(&apos;click&apos;, function() {
                    var markerPanoID = data.location.pano;

                    // Set the Pano to use the passed panoID.
                    panorama.setPano(markerPanoID);
                    panorama.setPov({
                        heading: 270,
                        pitch: 0
                    });

                    panorama.setVisible(true);
                });
            }
            else {
                console.error(&apos;Street View data not found for this location.&apos;);
            }
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
