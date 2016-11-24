@extends('layouts.app')

@section('title', 'Overlay map type')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Overlay map type
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
        /** @constructor */
        function CoordMapType(tileSize) {
            this.tileSize = tileSize;
        }

        CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
            var div = ownerDocument.createElement('div');

            div.innerHTML         = coord;
            div.style.width       = this.tileSize.width + 'px';
            div.style.height      = this.tileSize.height + 'px';
            div.style.fontSize    = '10';
            div.style.borderStyle = 'solid';
            div.style.borderWidth = '1px';
            div.style.borderColor = '#AAAAAA';

            return div;
        };

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            map.overlayMapTypes.insertAt(
                0,
                new CoordMapType(new google.maps.Size(256, 256))
            );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        /*
        * This demo illustrates the coordinate system used to display map tiles in the
        * API.
        *
        * Tiles in Google Maps are numbered from the same origin as that for
        * pixels. For Google&apos;s implementation of the Mercator projection, the origin
        * tile is always at the northwest corner of the map, with x values increasing
        * from west to east and y values increasing from north to south.
        *
        * Try panning and zooming the map to see how the coordinates change.
        */

        /** @constructor */
        function CoordMapType(tileSize) {
            this.tileSize = tileSize;
        }

        CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
            var div = ownerDocument.createElement(&apos;div&apos;);

            div.innerHTML         = coord;
            div.style.width       = this.tileSize.width + &apos;px&apos;;
            div.style.height      = this.tileSize.height + &apos;px&apos;;
            div.style.fontSize    = &apos;10&apos;;
            div.style.borderStyle = &apos;solid&apos;;
            div.style.borderWidth = &apos;1px&apos;;
            div.style.borderColor = &apos;#AAAAAA&apos;;

            return div;
        };

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146}
            });

            // Insert this overlay map type as the first overlay map type at
            // position 0. Note that all overlay map types appear on top of
            // their parent base map.
            map.overlayMapTypes.insertAt(
                0,
                new CoordMapType(new google.maps.Size(256, 256))
            );
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
