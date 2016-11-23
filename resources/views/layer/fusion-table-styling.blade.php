@extends('layouts.app')

@section('title', 'Fusion Table: Styling')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Fusion Table: Styling
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
                center  : {lat: -25, lng: 133},
                zoom    : 4
            });

            var layer = new google.maps.FusionTablesLayer({
                query: {
                    select: 'geometry',
                    from: '1ertEwm-1bMBhpEwHhtNYT47HQ9k2ki_6sRa-UQ'
                },
                styles: [
                    {
                        polygonOptions: {
                            fillColor: '#00FF00',
                            fillOpacity: 0.3
                        }
                    }, {
                        where: 'birds > 300',
                        polygonOptions: {
                            fillColor: '#0000FF'
                        }
                    }, {
                        where: 'population > 5',
                        polygonOptions: {
                            fillOpacity: 1.0
                        }
                    }
                ]
            });

            layer.setMap(map);
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap">
    </script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center  : {lat: -25, lng: 133},
                zoom    : 4
            });

            var layer = new google.maps.FusionTablesLayer({
                query: {
                    select: &apos;geometry&apos;,
                    from: &apos;1ertEwm-1bMBhpEwHhtNYT47HQ9k2ki_6sRa-UQ&apos;
                },
                styles: [
                    {
                        polygonOptions: {
                            fillColor: &apos;#00FF00&apos;,
                            fillOpacity: 0.3
                        }
                    }, {
                        where: &apos;birds &gt; 300&apos;,
                        polygonOptions: {
                            fillColor: &apos;#0000FF&apos;
                        }
                    }, {
                        where: &apos;population &gt; 5&apos;,
                        polygonOptions: {
                            fillOpacity: 1.0
                        }
                    }
                ]
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
