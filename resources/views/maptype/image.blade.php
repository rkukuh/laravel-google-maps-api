@extends('layouts.app')

@section('title', 'Image map type')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Image map type
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
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center  : {lat: 0, lng: 0},
                zoom    : 1,
                streetViewControl       : false,
                mapTypeControlOptions   : {
                    mapTypeIds: ['moon']
                }
            });

            var moonMapType = new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    var normalizedCoord = getNormalizedCoord(coord, zoom);

                    if (!normalizedCoord) {
                        return null;
                    }

                    var bound = Math.pow(2, zoom);

                    return '//mw1.google.com/mw-planetary/lunar/lunarmaps_v1/clem_bw' +
                           '/' + zoom + '/' + normalizedCoord.x + '/' + (bound - normalizedCoord.y - 1) + '.jpg';
                },
                tileSize    : new google.maps.Size(256, 256),
                maxZoom     : 9,
                minZoom     : 0,
                radius      : 1738000,
                name        : 'Moon'
            });

            map.mapTypes.set('moon', moonMapType);
            map.setMapTypeId('moon');
        }

        // Normalizes the coords that tiles repeat across the x axis (horizontally)
        // like the standard Google map tiles.
        function getNormalizedCoord(coord, zoom) {
            var y = coord.y;
            var x = coord.x;

            // tile range in one direction range is dependent on zoom level
            // 0 = 1 tile, 1 = 2 tiles, 2 = 4 tiles, 3 = 8 tiles, etc
            var tileRange = 1 << zoom;

            // don't repeat across y-axis (vertically)
            if (y < 0 || y >= tileRange) {
                return null;
            }

            // repeat across x-axis
            if (x < 0 || x >= tileRange) {
                x = (x % tileRange + tileRange) % tileRange;
            }

            return {x: x, y: y};
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center  : {lat: 0, lng: 0},
                zoom    : 1,
                streetViewControl       : false,
                mapTypeControlOptions   : {
                    mapTypeIds: [&apos;moon&apos;]
                }
            });

            var moonMapType = new google.maps.ImageMapType({
                getTileUrl: function(coord, zoom) {
                    var normalizedCoord = getNormalizedCoord(coord, zoom);

                    if (!normalizedCoord) {
                        return null;
                    }

                    var bound = Math.pow(2, zoom);

                    return &apos;//mw1.google.com/mw-planetary/lunar/lunarmaps_v1/clem_bw&apos; +
                           &apos;/&apos; + zoom + &apos;/&apos; + normalizedCoord.x + &apos;/&apos; + (bound - normalizedCoord.y - 1) + &apos;.jpg&apos;;
                },
                tileSize    : new google.maps.Size(256, 256),
                maxZoom     : 9,
                minZoom     : 0,
                radius      : 1738000,
                name        : &apos;Moon&apos;
            });

            map.mapTypes.set(&apos;moon&apos;, moonMapType);
            map.setMapTypeId(&apos;moon&apos;);
        }

        // Normalizes the coords that tiles repeat across the x axis (horizontally)
        // like the standard Google map tiles.
        function getNormalizedCoord(coord, zoom) {
            var y = coord.y;
            var x = coord.x;

            // tile range in one direction range is dependent on zoom level
            // 0 = 1 tile, 1 = 2 tiles, 2 = 4 tiles, 3 = 8 tiles, etc
            var tileRange = 1 &lt;&lt; zoom;

            // don&apos;t repeat across y-axis (vertically)
            if (y &lt; 0 || y &gt;= tileRange) {
                return null;
            }

            // repeat across x-axis
            if (x &lt; 0 || x &gt;= tileRange) {
                x = (x % tileRange + tileRange) % tileRange;
            }

            return {x: x, y: y};
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
