@extends('layouts.app')

@section('title', 'Styled maps')

@section('content')
    <h1>Styled maps</h1>

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
                center: {lat: 40.674, lng: -73.945},
                zoom: 12,
                styles: [
                    {
                        featureType: 'all',
                        stylers: [
                            { saturation: -80 }
                        ]
                    }, {
                        featureType: 'road.arterial',
                        elementType: 'geometry',
                        stylers: [
                            { hue: '#00ffee' },
                            { saturation: 50 }
                        ]
                    }, {
                        featureType: 'poi.business',
                        elementType: 'labels',
                        stylers: [
                            { visibility: 'off' }
                        ]
                    }
                ]
            });
        }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
