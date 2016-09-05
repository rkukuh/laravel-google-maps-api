@extends('layouts.app')

@section('title', 'Signed-in Map')

@section('content')
    <h1>Signed-in Map</h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
<script>
    // This example enables Sign In by loading the Maps API with the signed_in
    // parameter set to true. For example:
    // https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: -33.8666, lng: 151.1958}
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&signed_in=true&callback=initMap"></script>
@endpush
