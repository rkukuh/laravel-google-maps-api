@extends('layouts.app')

@section('title', 'Custom street view panorama tiles')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom street view panorama tiles
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
        var panorama;

        // StreetViewPanoramaData of a panorama just outside the Google Sydney office.
        var outsideGoogle;

        // StreetViewPanoramaData for a custom panorama: the Google Sydney reception.
        function getReceptionPanoramaData() {
            return {
                location: {
                    pano: 'reception',  // The ID for this custom panorama.
                    description: 'Google Sydney - Reception',
                    latLng: new google.maps.LatLng(-33.86684, 151.19583)
                },
                links: [{
                    heading: 195,
                    description: 'Exit',
                    pano: outsideGoogle.location.pano
                }],
                copyright: 'Imagery (c) 2010 Google',
                tiles: {
                    tileSize: new google.maps.Size(1024, 512),
                    worldSize: new google.maps.Size(2048, 1024),
                    centerHeading: 105,
                    getTileUrl: function(pano, zoom, tileX, tileY) {
                        return 'https://developers.google.com/maps/documentation/javascript/examples/full/images/' +
                               'panoReception1024-' + zoom + '-' + tileX + '-' + tileY + '.jpg';
                    }
                }
            };
        }

        function initPanorama() {
            panorama = new google.maps.StreetViewPanorama(
                document.getElementById('map'),
                {
                    pano: outsideGoogle.location.pano,
                    // Register a provider for our custom panorama.
                    panoProvider: function(pano) {
                        if (pano === 'reception') {
                            return getReceptionPanoramaData();
                        }
                    }
                }
            );

            // Add a link to our custom panorama from outside the Google Sydney office.
            panorama.addListener('links_changed', function() {
                if (panorama.getPano() === outsideGoogle.location.pano) {
                    panorama.getLinks().push({
                        description: 'Google Sydney',
                        heading: 25,
                        pano: 'reception'
                    });
                }
            });
        }

        function initialize() {
            // Use the Street View service to find a pano ID on Pirrama Rd, outside the
            // Google office.
            var streetviewService = new google.maps.StreetViewService;

            streetviewService.getPanorama(
                {location: {lat: -33.867386, lng: 151.195767}},
                function(result, status) {
                    if (status === 'OK') {
                        outsideGoogle = result;
                        initPanorama();
                    }
                }
            );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initialize"></script>
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
