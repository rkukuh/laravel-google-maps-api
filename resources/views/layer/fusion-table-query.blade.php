@extends('layouts.app')

@section('title', 'Fusion Table: Query')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Fusion Table: Query
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
            center  : {lat: 41.948766, lng: -87.691497},
            zoom    : 12
        });

        var layer = new google.maps.FusionTablesLayer({
            query: {
                select: 'address',
                from: '1d7qpn60tAvG4LEg4jvClZbc1ggp8fIGGvpMGzA',
                where: 'ridership > 5000'
            }
        });

        layer.setMap(map);
    }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center  : {lat: 41.948766, lng: -87.691497},
                zoom    : 12
            });

            var layer = new google.maps.FusionTablesLayer({
                query: {
                    select: &apos;address&apos;,
                    from: &apos;1d7qpn60tAvG4LEg4jvClZbc1ggp8fIGGvpMGzA&apos;,
                    where: &apos;ridership &gt; 5000&apos;
                }
            });

            layer.setMap(map);
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
