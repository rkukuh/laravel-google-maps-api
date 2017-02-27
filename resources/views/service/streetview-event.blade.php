@extends('layouts.app')

@section('title', 'Street View events')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Street View events
    </h1>

    <div id="pano"></div>
    <div id="floating-panel">
        <table class="table">
            <tr>
                <td><b>Position</b></td><td id="position-cell">&nbsp;</td>
            </tr>
            <tr>
                <td><b>POV Heading</b></td><td id="heading-cell">270</td>
            </tr>
            <tr>
                <td><b>POV Pitch</b></td><td id="pitch-cell">0.0</td>
            </tr>
            <tr>
                <td><b>Pano ID</b></td><td id="pano-cell">&nbsp;</td>
            </tr>
            <tr>
                <td><b>Links</b></td>
                <td>
                    <table id="links_table"></table>
                </td>
            </tr>
        </table>
    </div>
@endsection

@push('css')
    <style>
        #floating-panel {
            position: absolute;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
            width: 35%;
            height: 100%;
            float: right;
            text-align: left;
            overflow: auto;
            position: static;
        }

        #pano {
            width: 65%;
            height: 500px;
            float: left;
        }
    </style>
@endpush

@push('js')
    <script>
        function initPano() {
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('pano'),
                {
                    position: {lat: 37.869, lng: -122.255},
                    pov: {
                        heading: 270,
                        pitch: 0
                    },
                    visible: true
                }
            );

            panorama.addListener('pano_changed', function() {
                var panoCell = document.getElementById('pano-cell');

                panoCell.innerHTML = panorama.getPano();
            });

            panorama.addListener('links_changed', function() {
                var linksTable = document.getElementById('links_table');

                while (linksTable.hasChildNodes()) {
                    linksTable.removeChild(linksTable.lastChild);
                }

                var links = panorama.getLinks();

                for (var i in links) {
                    var row = document.createElement('tr');

                    linksTable.appendChild(row);

                    var labelCell = document.createElement('td');

                    labelCell.innerHTML = '<b>Link: ' + i + '</b>';

                    var valueCell = document.createElement('td');

                    valueCell.innerHTML = links[i].description;

                    linksTable.appendChild(labelCell);
                    linksTable.appendChild(valueCell);
                }
            });

            panorama.addListener('position_changed', function() {
                var positionCell = document.getElementById('position-cell');

                positionCell.firstChild.nodeValue = panorama.getPosition() + '';
            });

            panorama.addListener('pov_changed', function() {
                var headingCell = document.getElementById('heading-cell');
                var pitchCell   = document.getElementById('pitch-cell');

                headingCell.firstChild.nodeValue = panorama.getPov().heading + '';
                pitchCell.firstChild.nodeValue = panorama.getPov().pitch + '';
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initPano"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        function initPano() {
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById(&apos;pano&apos;),
                {
                    position: {lat: 37.869, lng: -122.255},
                    pov: {
                        heading: 270,
                        pitch: 0
                    },
                    visible: true
                }
            );

            panorama.addListener(&apos;pano_changed&apos;, function() {
                var panoCell = document.getElementById(&apos;pano-cell&apos;);

                panoCell.innerHTML = panorama.getPano();
            });

            panorama.addListener(&apos;links_changed&apos;, function() {
                var linksTable = document.getElementById(&apos;links_table&apos;);

                while (linksTable.hasChildNodes()) {
                    linksTable.removeChild(linksTable.lastChild);
                }

                var links = panorama.getLinks();

                for (var i in links) {
                    var row = document.createElement(&apos;tr&apos;);

                    linksTable.appendChild(row);

                    var labelCell = document.createElement(&apos;td&apos;);

                    labelCell.innerHTML = &apos;&lt;b&gt;Link: &apos; + i + &apos;&lt;/b&gt;&apos;;

                    var valueCell = document.createElement(&apos;td&apos;);

                    valueCell.innerHTML = links[i].description;

                    linksTable.appendChild(labelCell);
                    linksTable.appendChild(valueCell);
                }
            });

            panorama.addListener(&apos;position_changed&apos;, function() {
                var positionCell = document.getElementById(&apos;position-cell&apos;);

                positionCell.firstChild.nodeValue = panorama.getPosition() + &apos;&apos;;
            });

            panorama.addListener(&apos;pov_changed&apos;, function() {
                var headingCell = document.getElementById(&apos;heading-cell&apos;);
                var pitchCell   = document.getElementById(&apos;pitch-cell&apos;);

                headingCell.firstChild.nodeValue = panorama.getPov().heading + &apos;&apos;;
                pitchCell.firstChild.nodeValue = panorama.getPov().pitch + &apos;&apos;;
            });
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;callback=initPano&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
