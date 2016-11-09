@extends('layouts.app')

@section('title', 'Info window with maxWidth')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Info window with maxWidth
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
        // This example displays a marker at the center of Australia.
        // When the user clicks the marker, an info window opens.
        // The maximum width of the info window is set to 200 pixels.

        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom    : 4,
                center  : uluru
            });

            var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                '<div id="bodyContent">'+
                '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                'sandstone rock formation in the southern part of the '+
                'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                'south west of the nearest large town, Alice Springs; 450&#160;km '+
                '(280&#160;mi) by road.</p>'+
                '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                '(last visited June 22, 2009).</p>'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content : contentString,
                maxWidth: 200
            });

            var marker = new google.maps.Marker({
                position    : uluru,
                map         : map,
                title       : 'Uluru (Ayers Rock)'
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example displays a marker at the center of Australia.
        // When the user clicks the marker, an info window opens.
        // The maximum width of the info window is set to 200 pixels.

        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};

            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom    : 4,
                center  : uluru
            });

            var contentString = &apos;&lt;div id=&quot;content&quot;&gt;&apos;+
                &apos;&lt;div id=&quot;siteNotice&quot;&gt;&apos;+
                &apos;&lt;/div&gt;&apos;+
                &apos;&lt;h1 id=&quot;firstHeading&quot; class=&quot;firstHeading&quot;&gt;Uluru&lt;/h1&gt;&apos;+
                &apos;&lt;div id=&quot;bodyContent&quot;&gt;&apos;+
                &apos;&lt;p&gt;&lt;b&gt;Uluru&lt;/b&gt;, also referred to as &lt;b&gt;Ayers Rock&lt;/b&gt;, is a large &apos; +
                &apos;sandstone rock formation in the southern part of the &apos;+
                &apos;Northern Territory, central Australia. It lies 335&amp;#160;km (208&amp;#160;mi) &apos;+
                &apos;south west of the nearest large town, Alice Springs; 450&amp;#160;km &apos;+
                &apos;(280&amp;#160;mi) by road.&lt;/p&gt;&apos;+
                &apos;&lt;p&gt;Attribution: Uluru, &lt;a href=&quot;https://en.wikipedia.org/w/index.php?title=Uluru&amp;oldid=297882194&quot;&gt;&apos;+
                &apos;https://en.wikipedia.org/w/index.php?title=Uluru&lt;/a&gt; &apos;+
                &apos;(last visited June 22, 2009).&lt;/p&gt;&apos;+
                &apos;&lt;/div&gt;&apos;+
                &apos;&lt;/div&gt;&apos;;

            var infowindow = new google.maps.InfoWindow({
                content : contentString,
                maxWidth: 200
            });

            var marker = new google.maps.Marker({
                position    : uluru,
                map         : map,
                title       : &apos;Uluru (Ayers Rock)&apos;
            });

            marker.addListener(&apos;click&apos;, function() {
                infowindow.open(map, marker);
            });
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
