@extends('layouts.app')

@section('title', 'Marker animation')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Marker animation
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
        // The following example creates a marker in Stockholm, Sweden using a DROP
        // animation. Clicking on the marker will toggle the animation between a BOUNCE
        // animation and no animation.

        var marker;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 15,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            marker = new google.maps.Marker({
                map         : map,
                draggable   : true,
                animation   : google.maps.Animation.DROP,
                position    : {lat: -7.265757, lng: 112.734146}
            });

            marker.addListener('click', toggleBounce);
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
