@extends('layouts.app')

@section('title', 'Custom street view panorama')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom street view panorama
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
        function initPano() {
            // Set up Street View and initially set it visible. Register the
            // custom panorama provider function. Set the StreetView to display
            // the custom panorama 'reception' which we check for below.
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('map'), {
                    pano: 'reception',
                    visible: true,
                    panoProvider: getCustomPanorama
                }
            );
        }

        // Return a pano image given the panoID.
        function getCustomPanoramaTileUrl(pano, zoom, tileX, tileY) {
            // Note: robust custom panorama methods would require tiled pano data.
            // Here we're just using a single tile, set to the tile size and equal
            // to the pano "world" size.
            return 'https://developers.google.com/maps/documentation/javascript/examples/full/images/panoReception1024-0.jpg';
        }

        // Construct the appropriate StreetViewPanoramaData given
        // the passed pano IDs.
        function getCustomPanorama(pano, zoom, tileX, tileY) {
            if (pano === 'reception') {
                return {
                    location: {
                        pano: 'reception',
                        description: 'Google Sydney - Reception'
                    },
                    links: [],
                    // The text for the copyright control.
                    copyright: 'Imagery (c) 2010 Google',
                    // The definition of the tiles for this panorama.
                    tiles: {
                        tileSize: new google.maps.Size(1024, 512),
                        worldSize: new google.maps.Size(1024, 512),
                        // The heading in degrees at the origin of the panorama
                        // tile set.
                        centerHeading: 105,
                        getTileUrl: getCustomPanoramaTileUrl
                    }
                };
            }
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initPano"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        //
    &lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
