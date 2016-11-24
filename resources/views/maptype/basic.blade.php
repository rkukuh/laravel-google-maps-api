@extends('layouts.app')

@section('title', 'Map type basic')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Map type basic
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
        /**
        * @constructor
        * @implements {google.maps.MapType}
        */
        function CoordMapType(tileSize) {
            this.tileSize = tileSize;
        }

        CoordMapType.prototype.maxZoom  = 19;
        CoordMapType.prototype.name     = 'Tile #s';
        CoordMapType.prototype.alt      = 'Tile Coordinate Map Type';

        CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
            var div = ownerDocument.createElement('div');

            div.innerHTML               = coord;
            div.style.width             = this.tileSize.width + 'px';
            div.style.height            = this.tileSize.height + 'px';
            div.style.fontSize          = '10';
            div.style.borderStyle       = 'solid';
            div.style.borderWidth       = '1px';
            div.style.borderColor       = '#AAAAAA';
            div.style.backgroundColor   = '#E5E3DF';

            return div;
        };

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146},
                streetViewControl   : false,
                mapTypeId           : 'coordinate',
                mapTypeControlOptions: {
                    mapTypeIds  : ['coordinate', 'roadmap'],
                    style       : google.maps.MapTypeControlStyle.DROPDOWN_MENU
                }
            });

            map.addListener('maptypeid_changed', function() {
                var showStreetViewControl = map.getMapTypeId() !== 'coordinate';

                map.setOptions({
                    streetViewControl: showStreetViewControl
                });
            });

            map.mapTypes.set(
                'coordinate',
                new CoordMapType(new google.maps.Size(256, 256))
            );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        /*
        * This demo demonstrates how to replace default map tiles with custom imagery.
        * In this case, the CoordMapType displays gray tiles annotated with the tile
        * coordinates.
        *
        * Try panning and zooming the map to see how the coordinates change.
        */

        /**
        * @constructor
        * @implements {google.maps.MapType}
        */
        function CoordMapType(tileSize) {
            this.tileSize = tileSize;
        }

        CoordMapType.prototype.maxZoom  = 19;
        CoordMapType.prototype.name     = &apos;Tile #s&apos;;
        CoordMapType.prototype.alt      = &apos;Tile Coordinate Map Type&apos;;

        CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
            var div = ownerDocument.createElement(&apos;div&apos;);

            div.innerHTML               = coord;
            div.style.width             = this.tileSize.width + &apos;px&apos;;
            div.style.height            = this.tileSize.height + &apos;px&apos;;
            div.style.fontSize          = &apos;10&apos;;
            div.style.borderStyle       = &apos;solid&apos;;
            div.style.borderWidth       = &apos;1px&apos;;
            div.style.borderColor       = &apos;#AAAAAA&apos;;
            div.style.backgroundColor   = &apos;#E5E3DF&apos;;

            return div;
        };

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 10,
                center  : {lat: -7.265757, lng: 112.734146},
                streetViewControl   : false,
                mapTypeId           : &apos;coordinate&apos;,
                mapTypeControlOptions: {
                    mapTypeIds  : [&apos;coordinate&apos;, &apos;roadmap&apos;],
                    style       : google.maps.MapTypeControlStyle.DROPDOWN_MENU
                }
            });

            map.addListener(&apos;maptypeid_changed&apos;, function() {
                var showStreetViewControl = map.getMapTypeId() !== &apos;coordinate&apos;;

                map.setOptions({
                    streetViewControl: showStreetViewControl
                });
            });

            // Now attach the coordinate map type to the map&apos;s registry.
            map.mapTypes.set(
                &apos;coordinate&apos;,
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
