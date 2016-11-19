@extends('layouts.app')

@section('title', 'Rectangle (shape) event')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Rectangle (shape) event
    </h1>

    <span><small class="text-primary">
        When the user changes the bounds of the rectangle, an info window pops up displaying the new bounds.
    </small></span>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        var rectangle;
        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 9,
                center  : {lat: 44.5452, lng: -78.5389}
            });

            var bounds = {
                north: 44.599,
                south: 44.490,
                east: -78.443,
                west: -78.649
            };

            rectangle = new google.maps.Rectangle({
                bounds: bounds,
                editable: true,
                draggable: true
            });

            rectangle.setMap(map);
            rectangle.addListener('bounds_changed', showNewRect);

            infoWindow = new google.maps.InfoWindow();
        }

        function showNewRect(event) {
            var ne = rectangle.getBounds().getNorthEast();
            var sw = rectangle.getBounds().getSouthWest();

            var contentString = '<b>Rectangle moved.</b><br>' +
            'New north-east corner: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
            'New south-west corner: ' + sw.lat() + ', ' + sw.lng();

            infoWindow.setContent(contentString);
            infoWindow.setPosition(ne);
            infoWindow.open(map);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var rectangle;
        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 9,
                center  : {lat: 44.5452, lng: -78.5389}
            });

            var bounds = {
                north: 44.599,
                south: 44.490,
                east: -78.443,
                west: -78.649
            };

            rectangle = new google.maps.Rectangle({
                bounds: bounds,
                editable: true,
                draggable: true
            });

            rectangle.setMap(map);
            rectangle.addListener(&apos;bounds_changed&apos;, showNewRect);

            infoWindow = new google.maps.InfoWindow();
        }

        function showNewRect(event) {
            var ne = rectangle.getBounds().getNorthEast();
            var sw = rectangle.getBounds().getSouthWest();

            var contentString = &apos;&lt;b&gt;Rectangle moved.&lt;/b&gt;&lt;br&gt;&apos; +
            &apos;New north-east corner: &apos; + ne.lat() + &apos;, &apos; + ne.lng() + &apos;&lt;br&gt;&apos; +
            &apos;New south-west corner: &apos; + sw.lat() + &apos;, &apos; + sw.lng();

            infoWindow.setContent(contentString);
            infoWindow.setPosition(ne);
            infoWindow.open(map);
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
