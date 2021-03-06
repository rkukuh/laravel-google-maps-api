@extends('layouts.app')

@section('title', 'Places: Autocomplete')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Places: Autocomplete
    </h1>

    <div id="map"></div>

    <input id="pac-input" class="controls" type="text" placeholder="Enter a location">

    <div id="type-selector" class="controls">
        <input type="radio" name="type" id="changetype-all" checked="checked">
        <label for="changetype-all">All</label>

        <input type="radio" name="type" id="changetype-establishment">
        <label for="changetype-establishment">Establishments</label>

        <input type="radio" name="type" id="changetype-address">
        <label for="changetype-address">Addresses</label>

        <input type="radio" name="type" id="changetype-geocode">
        <label for="changetype-geocode">Geocodes</label>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
    </style>
@endpush

@push('js')
    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 13
            });

            var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input')
            );

            var types = document.getElementById('type-selector');

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();

            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);

                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }

                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';

                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);

                radioButton.addEventListener('click', function() {
                    autocomplete.setTypes(types);
                });
            }

            setupClickListener('changetype-all', []);
            setupClickListener('changetype-address', ['address']);
            setupClickListener('changetype-establishment', ['establishment']);
            setupClickListener('changetype-geocode', ['geocode']);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=places&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&amp;libraries=places&quot;&gt;

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                center: {lat: -7.265757, lng: 112.734146},
                zoom: 13
            });

            var input = /** @type {!HTMLInputElement} */(
                document.getElementById(&apos;pac-input&apos;)
            );

            var types = document.getElementById(&apos;type-selector&apos;);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.bindTo(&apos;bounds&apos;, map);

            var infowindow = new google.maps.InfoWindow();

            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener(&apos;place_changed&apos;, function() {
                infowindow.close();
                marker.setVisible(false);

                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    window.alert(&quot;Autocomplete&apos;s returned place contains no geometry&quot;);
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }

                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = &apos;&apos;;

                if (place.address_components) {
                    address = [
                        (place.address_components[0] &amp;&amp; place.address_components[0].short_name || &apos;&apos;),
                        (place.address_components[1] &amp;&amp; place.address_components[1].short_name || &apos;&apos;),
                        (place.address_components[2] &amp;&amp; place.address_components[2].short_name || &apos;&apos;)
                    ].join(&apos; &apos;);
                }

                infowindow.setContent(&apos;&lt;div&gt;&lt;strong&gt;&apos; + place.name + &apos;&lt;/strong&gt;&lt;br&gt;&apos; + address);
                infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
                var radioButton = document.getElementById(id);

                radioButton.addEventListener(&apos;click&apos;, function() {
                    autocomplete.setTypes(types);
                });
            }

            setupClickListener(&apos;changetype-all&apos;, []);
            setupClickListener(&apos;changetype-address&apos;, [&apos;address&apos;]);
            setupClickListener(&apos;changetype-establishment&apos;, [&apos;establishment&apos;]);
            setupClickListener(&apos;changetype-geocode&apos;, [&apos;geocode&apos;]);
        }
    &lt;/script&gt;

    &lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&amp;libraries=places&amp;callback=initMap&quot;&gt;&lt;/script&gt;
@endsection

@section('source-code-css')

    #map { height: 500px; }

    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }
@endsection

@section('source-code-html')

    &lt;div id=&quot;map&quot;&gt;&lt;/div&gt;

    &lt;input id=&quot;pac-input&quot; class=&quot;controls&quot; type=&quot;text&quot; placeholder=&quot;Enter a location&quot;&gt;

    &lt;div id=&quot;type-selector&quot; class=&quot;controls&quot;&gt;
        &lt;input type=&quot;radio&quot; name=&quot;type&quot; id=&quot;changetype-all&quot; checked=&quot;checked&quot;&gt;
        &lt;label for=&quot;changetype-all&quot;&gt;All&lt;/label&gt;

        &lt;input type=&quot;radio&quot; name=&quot;type&quot; id=&quot;changetype-establishment&quot;&gt;
        &lt;label for=&quot;changetype-establishment&quot;&gt;Establishments&lt;/label&gt;

        &lt;input type=&quot;radio&quot; name=&quot;type&quot; id=&quot;changetype-address&quot;&gt;
        &lt;label for=&quot;changetype-address&quot;&gt;Addresses&lt;/label&gt;

        &lt;input type=&quot;radio&quot; name=&quot;type&quot; id=&quot;changetype-geocode&quot;&gt;
        &lt;label for=&quot;changetype-geocode&quot;&gt;Geocodes&lt;/label&gt;
    &lt;/div&gt;
@endsection
