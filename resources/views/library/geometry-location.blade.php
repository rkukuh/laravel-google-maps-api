@extends('layouts.app')

@section('title', 'Geometry: containsLocation()')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Geometry: containsLocation()
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
        // This example requires the Geometry library. Include the libraries=geometry
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.886, lng: -70.269},
                zoom: 5,
            });

            var triangleCoords = [
                {lat: 25.774, lng: -80.19},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            var bermudaTriangle = new google.maps.Polygon({paths: triangleCoords});

            google.maps.event.addListener(map, 'click', function(e) {
                var resultColor =
                google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle) ?
                'red' :
                'green';

                new google.maps.Marker({
                    position: e.latLng,
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        fillColor: resultColor,
                        fillOpacity: .2,
                        strokeColor: 'white',
                        strokeWeight: .5,
                        scale: 10
                    }
                });
            });
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=geometry&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Geometry library. Include the libraries=geometry
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=geometry&quot;&gt;

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: {lat: 24.886, lng: -70.269},
                zoom: 5,
            });

            var triangleCoords = [
                {lat: 25.774, lng: -80.19},
                {lat: 18.466, lng: -66.118},
                {lat: 32.321, lng: -64.757}
            ];

            var bermudaTriangle = new google.maps.Polygon({paths: triangleCoords});

            google.maps.event.addListener(map, &apos;click&apos;, function(e) {
                var resultColor =
                google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle) ?
                &apos;red&apos; :
                &apos;green&apos;;

                new google.maps.Marker({
                    position: e.latLng,
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        fillColor: resultColor,
                        fillOpacity: .2,
                        strokeColor: &apos;white&apos;,
                        strokeWeight: .5,
                        scale: 10
                    }
                });
            });
        }
    &lt;/script&gt;

    &lt;script async defer
    src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&amp;libraries=geometry&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
