@extends('layouts.app')

@section('title', 'Heatmap')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Heatmap
    </h1>

    <div id="floating-panel">
        <button onclick="toggleHeatmap()">Toggle Heatmap</button>
        <button onclick="changeGradient()">Change gradient</button>
        <button onclick="changeRadius()">Change radius</button>
        <button onclick="changeOpacity()">Change opacity</button>
    </div>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        var map, heatmap;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 13,
                center      : {lat: 37.775, lng: -122.434},
                mapTypeId   : 'satellite'
            });

            heatmap = new google.maps.visualization.HeatmapLayer({
                data    : getPoints(),
                map     : map
            });
        }

        function toggleHeatmap() {
            heatmap.setMap(heatmap.getMap() ? null : map);
        }

        function changeGradient() {
            var gradient = [
                'rgba(0, 255, 255, 0)',
                'rgba(0, 255, 255, 1)',
                'rgba(0, 191, 255, 1)',
                'rgba(0, 127, 255, 1)',
                'rgba(0, 63, 255, 1)',
                'rgba(0, 0, 255, 1)',
                'rgba(0, 0, 223, 1)',
                'rgba(0, 0, 191, 1)',
                'rgba(0, 0, 159, 1)',
                'rgba(0, 0, 127, 1)',
                'rgba(63, 0, 91, 1)',
                'rgba(127, 0, 63, 1)',
                'rgba(191, 0, 31, 1)',
                'rgba(255, 0, 0, 1)'
            ]

            heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
        }

        function changeRadius() {
            heatmap.set('radius', heatmap.get('radius') ? null : 20);
        }

        function changeOpacity() {
            heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
        }

        function getPoints() {
            return [
                new google.maps.LatLng(37.782551, -122.445368),
                new google.maps.LatLng(37.782745, -122.444586),
                new google.maps.LatLng(37.782842, -122.443688),
                new google.maps.LatLng(37.782919, -122.442815),
                new google.maps.LatLng(37.782992, -122.442112),
                new google.maps.LatLng(37.783100, -122.441461),
                new google.maps.LatLng(37.783206, -122.440829),
                new google.maps.LatLng(37.783273, -122.440324),
                new google.maps.LatLng(37.783316, -122.440023),
                new google.maps.LatLng(37.783357, -122.439794),
                new google.maps.LatLng(37.783371, -122.439687),
                new google.maps.LatLng(37.783368, -122.439666),
                new google.maps.LatLng(37.783383, -122.439594),
                new google.maps.LatLng(37.783508, -122.439525),
                new google.maps.LatLng(37.783842, -122.439591),
                new google.maps.LatLng(37.784147, -122.439668),
                new google.maps.LatLng(37.784206, -122.439686),
                new google.maps.LatLng(37.784386, -122.439790),
                new google.maps.LatLng(37.784701, -122.439902),
                new google.maps.LatLng(37.784965, -122.439938),
                new google.maps.LatLng(37.785010, -122.439947),
                new google.maps.LatLng(37.785360, -122.439952),
                new google.maps.LatLng(37.785715, -122.440030),
                new google.maps.LatLng(37.786117, -122.440119),
                new google.maps.LatLng(37.786564, -122.440209),
                new google.maps.LatLng(37.786905, -122.440270),
                new google.maps.LatLng(37.786956, -122.440279),
                new google.maps.LatLng(37.800224, -122.433520),
                new google.maps.LatLng(37.800155, -122.434101),
                new google.maps.LatLng(37.800160, -122.434430),
                new google.maps.LatLng(37.800378, -122.434527),
                new google.maps.LatLng(37.800738, -122.434598),
                new google.maps.LatLng(37.800938, -122.434650),
                new google.maps.LatLng(37.801024, -122.434889),
                new google.maps.LatLng(37.800955, -122.435392),
                new google.maps.LatLng(37.800886, -122.435959),
                new google.maps.LatLng(37.800811, -122.436275),
                new google.maps.LatLng(37.800788, -122.436299),
                new google.maps.LatLng(37.800719, -122.436302),
                new google.maps.LatLng(37.800702, -122.436298),
                new google.maps.LatLng(37.800661, -122.436273),
                new google.maps.LatLng(37.800395, -122.436172),
                new google.maps.LatLng(37.800228, -122.436116),
                new google.maps.LatLng(37.800169, -122.436130),
                new google.maps.LatLng(37.800066, -122.436167),
                new google.maps.LatLng(37.784345, -122.422922),
                new google.maps.LatLng(37.784389, -122.422926),
                new google.maps.LatLng(37.784437, -122.422924),
                new google.maps.LatLng(37.784746, -122.422818),
                new google.maps.LatLng(37.785436, -122.422959),
                new google.maps.LatLng(37.786120, -122.423112),
                new google.maps.LatLng(37.786433, -122.423029),
                new google.maps.LatLng(37.786631, -122.421213),
                new google.maps.LatLng(37.786660, -122.421033),
                new google.maps.LatLng(37.786801, -122.420141),
                new google.maps.LatLng(37.786823, -122.420034),
                new google.maps.LatLng(37.786831, -122.419916),
                new google.maps.LatLng(37.787034, -122.418208),
                new google.maps.LatLng(37.787056, -122.418034),
                new google.maps.LatLng(37.787169, -122.417145),
                new google.maps.LatLng(37.787217, -122.416715),
                new google.maps.LatLng(37.786144, -122.416403),
                new google.maps.LatLng(37.785292, -122.416257),
                new google.maps.LatLng(37.780666, -122.390374),
                new google.maps.LatLng(37.780501, -122.391281),
                new google.maps.LatLng(37.780148, -122.392052),
                new google.maps.LatLng(37.780173, -122.391148),
                new google.maps.LatLng(37.780693, -122.390592),
                new google.maps.LatLng(37.781261, -122.391142),
                new google.maps.LatLng(37.781808, -122.391730),
                new google.maps.LatLng(37.782340, -122.392341),
                new google.maps.LatLng(37.782812, -122.393022),
                new google.maps.LatLng(37.783300, -122.393672)
            ];
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=visualization&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Visualization library. Include the libraries=visualization
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=visualization&quot;&gt;

        var map, heatmap;

        function initMap() {
            map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 13,
                center      : {lat: 37.775, lng: -122.434},
                mapTypeId   : &apos;satellite&apos;
            });

            heatmap = new google.maps.visualization.HeatmapLayer({
                data    : getPoints(),
                map     : map
            });
        }

        function toggleHeatmap() {
            heatmap.setMap(heatmap.getMap() ? null : map);
        }

        function changeGradient() {
            var gradient = [
                &apos;rgba(0, 255, 255, 0)&apos;,
                &apos;rgba(0, 255, 255, 1)&apos;,
                &apos;rgba(0, 191, 255, 1)&apos;,
                &apos;rgba(0, 127, 255, 1)&apos;,
                &apos;rgba(0, 63, 255, 1)&apos;,
                &apos;rgba(0, 0, 255, 1)&apos;,
                &apos;rgba(0, 0, 223, 1)&apos;,
                &apos;rgba(0, 0, 191, 1)&apos;,
                &apos;rgba(0, 0, 159, 1)&apos;,
                &apos;rgba(0, 0, 127, 1)&apos;,
                &apos;rgba(63, 0, 91, 1)&apos;,
                &apos;rgba(127, 0, 63, 1)&apos;,
                &apos;rgba(191, 0, 31, 1)&apos;,
                &apos;rgba(255, 0, 0, 1)&apos;
            ]

            heatmap.set(&apos;gradient&apos;, heatmap.get(&apos;gradient&apos;) ? null : gradient);
        }

        function changeRadius() {
            heatmap.set(&apos;radius&apos;, heatmap.get(&apos;radius&apos;) ? null : 20);
        }

        function changeOpacity() {
            heatmap.set(&apos;opacity&apos;, heatmap.get(&apos;opacity&apos;) ? null : 0.2);
        }

        function getPoints() {
            return [
                new google.maps.LatLng(37.782551, -122.445368),
                new google.maps.LatLng(37.782745, -122.444586),
                new google.maps.LatLng(37.782842, -122.443688),
                new google.maps.LatLng(37.782919, -122.442815),
                new google.maps.LatLng(37.782992, -122.442112),
                new google.maps.LatLng(37.783100, -122.441461),
                new google.maps.LatLng(37.783206, -122.440829),
                new google.maps.LatLng(37.783273, -122.440324),
                new google.maps.LatLng(37.783316, -122.440023),
                new google.maps.LatLng(37.783357, -122.439794),
                new google.maps.LatLng(37.783371, -122.439687),
                new google.maps.LatLng(37.783368, -122.439666),
                new google.maps.LatLng(37.783383, -122.439594),
                new google.maps.LatLng(37.783508, -122.439525),
                new google.maps.LatLng(37.783842, -122.439591),
                new google.maps.LatLng(37.784147, -122.439668),
                new google.maps.LatLng(37.784206, -122.439686),
                new google.maps.LatLng(37.784386, -122.439790),
                new google.maps.LatLng(37.784701, -122.439902),
                new google.maps.LatLng(37.784965, -122.439938),
                new google.maps.LatLng(37.785010, -122.439947),
                new google.maps.LatLng(37.785360, -122.439952),
                new google.maps.LatLng(37.785715, -122.440030),
                new google.maps.LatLng(37.786117, -122.440119),
                new google.maps.LatLng(37.786564, -122.440209),
                new google.maps.LatLng(37.786905, -122.440270),
                new google.maps.LatLng(37.786956, -122.440279),
                new google.maps.LatLng(37.800224, -122.433520),
                new google.maps.LatLng(37.800155, -122.434101),
                new google.maps.LatLng(37.800160, -122.434430),
                new google.maps.LatLng(37.800378, -122.434527),
                new google.maps.LatLng(37.800738, -122.434598),
                new google.maps.LatLng(37.800938, -122.434650),
                new google.maps.LatLng(37.801024, -122.434889),
                new google.maps.LatLng(37.800955, -122.435392),
                new google.maps.LatLng(37.800886, -122.435959),
                new google.maps.LatLng(37.800811, -122.436275),
                new google.maps.LatLng(37.800788, -122.436299),
                new google.maps.LatLng(37.800719, -122.436302),
                new google.maps.LatLng(37.800702, -122.436298),
                new google.maps.LatLng(37.800661, -122.436273),
                new google.maps.LatLng(37.800395, -122.436172),
                new google.maps.LatLng(37.800228, -122.436116),
                new google.maps.LatLng(37.800169, -122.436130),
                new google.maps.LatLng(37.800066, -122.436167),
                new google.maps.LatLng(37.784345, -122.422922),
                new google.maps.LatLng(37.784389, -122.422926),
                new google.maps.LatLng(37.784437, -122.422924),
                new google.maps.LatLng(37.784746, -122.422818),
                new google.maps.LatLng(37.785436, -122.422959),
                new google.maps.LatLng(37.786120, -122.423112),
                new google.maps.LatLng(37.786433, -122.423029),
                new google.maps.LatLng(37.786631, -122.421213),
                new google.maps.LatLng(37.786660, -122.421033),
                new google.maps.LatLng(37.786801, -122.420141),
                new google.maps.LatLng(37.786823, -122.420034),
                new google.maps.LatLng(37.786831, -122.419916),
                new google.maps.LatLng(37.787034, -122.418208),
                new google.maps.LatLng(37.787056, -122.418034),
                new google.maps.LatLng(37.787169, -122.417145),
                new google.maps.LatLng(37.787217, -122.416715),
                new google.maps.LatLng(37.786144, -122.416403),
                new google.maps.LatLng(37.785292, -122.416257),
                new google.maps.LatLng(37.780666, -122.390374),
                new google.maps.LatLng(37.780501, -122.391281),
                new google.maps.LatLng(37.780148, -122.392052),
                new google.maps.LatLng(37.780173, -122.391148),
                new google.maps.LatLng(37.780693, -122.390592),
                new google.maps.LatLng(37.781261, -122.391142),
                new google.maps.LatLng(37.781808, -122.391730),
                new google.maps.LatLng(37.782340, -122.392341),
                new google.maps.LatLng(37.782812, -122.393022),
                new google.maps.LatLng(37.783300, -122.393672)
            ];
        }
    &lt;/script&gt;

    &lt;script async defer
        src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;libraries=visualization&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map { height: 500px; }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
@endsection

@section('source-code-html')

    <div id="floating-panel">
        <button onclick="toggleHeatmap()">Toggle Heatmap</button>
        <button onclick="changeGradient()">Change gradient</button>
        <button onclick="changeRadius()">Change radius</button>
        <button onclick="changeOpacity()">Change opacity</button>
    </div>

    <div id="map"></div>
@endsection
