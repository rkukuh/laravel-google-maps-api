@extends('layouts.app')

@section('title', 'Adding state to controls')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Adding state to controls
    </h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #goCenterUI, #setCenterUI {
            background-color: #fff;
            border: 2px solid #fff;
            border-radius: 3px;
            box-shadow: 0 2px 6px rgba(0,0,0,.3);
            cursor: pointer;
            float: left;
            margin-bottom: 22px;
            text-align: center;
        }

        #goCenterText, #setCenterText {
            color: rgb(25,25,25);
            font-family: Roboto,Arial,sans-serif;
            font-size: 15px;
            line-height: 25px;
            padding-left: 5px;
            padding-right: 5px;
        }

        #setCenterUI { margin-left: 12px; }
    </style>
@endpush

@push('js')
    <script>
        var map;
        var surabaya = {lat: -7.265757, lng: 112.734146};

        function CenterControl(controlDiv, map, center) {
            var control = this;

            control.center_ = center;
            controlDiv.style.clear = 'both';

            var goCenterUI      = document.createElement('div');
            goCenterUI.id       = 'goCenterUI';
            goCenterUI.title    = 'Click to recenter the map';

            controlDiv.appendChild(goCenterUI);

            var goCenterText        = document.createElement('div');
            goCenterText.id         = 'goCenterText';
            goCenterText.innerHTML  = 'Center Map';

            goCenterUI.appendChild(goCenterText);

            var setCenterUI     = document.createElement('div');
            setCenterUI.id      = 'setCenterUI';
            setCenterUI.title   = 'Click to change the center of the map';

            controlDiv.appendChild(setCenterUI);

            var setCenterText       = document.createElement('div');
            setCenterText.id        = 'setCenterText';
            setCenterText.innerHTML = 'Set Center';

            setCenterUI.appendChild(setCenterText);

            goCenterUI.addEventListener('click', function() {
                var currentCenter = control.getCenter();
                map.setCenter(currentCenter);
            });

            setCenterUI.addEventListener('click', function() {
                var newCenter = map.getCenter();
                control.setCenter(newCenter);
            });
        }

        CenterControl.prototype.center_ = null;

        CenterControl.prototype.getCenter = function() {
            return this.center_;
        };

        CenterControl.prototype.setCenter = function(center) {
            this.center_ = center;
        };

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: surabaya
            });

            var centerControlDiv = document.createElement('div');
            var centerControl = new CenterControl(centerControlDiv, map, surabaya);

            centerControlDiv.index = 1;
            centerControlDiv.style['padding-top'] = '10px';

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush

@section('source-code-javascript')

    &lt;script&gt;
        var map;
        var surabaya = {lat: -7.265757, lng: 112.734146};

        /**
        * The CenterControl adds a control to the map that recenters the map on surabaya.
        * @constructor
        * @param {!Element} controlDiv
        * @param {!google.maps.Map} map
        * @param {?google.maps.LatLng} center
        */
        function CenterControl(controlDiv, map, center) {
            // We set up a variable for this since we&apos;re adding event listeners later.
            var control = this;

            // Set the center property upon construction
            control.center_ = center;
            controlDiv.style.clear = &quot;both&quot;;

            // Set CSS for the control border
            var goCenterUI      = document.createElement(&quot;div&quot;);
            goCenterUI.id       = &quot;goCenterUI&quot;;
            goCenterUI.title    = &quot;Click to recenter the map&quot;;

            controlDiv.appendChild(goCenterUI);

            // Set CSS for the control interior
            var goCenterText        = document.createElement(&quot;div&quot;);
            goCenterText.id         = &quot;goCenterText&quot;;
            goCenterText.innerHTML  = &quot;Center Map&quot;;

            goCenterUI.appendChild(goCenterText);

            // Set CSS for the setCenter control border
            var setCenterUI     = document.createElement(&quot;div&quot;);
            setCenterUI.id      = &quot;setCenterUI&quot;;
            setCenterUI.title   = &quot;Click to change the center of the map&quot;;

            controlDiv.appendChild(setCenterUI);

            // Set CSS for the control interior
            var setCenterText       = document.createElement(&quot;div&quot;);
            setCenterText.id        = &quot;setCenterText&quot;;
            setCenterText.innerHTML = &quot;Set Center&quot;;

            setCenterUI.appendChild(setCenterText);

            // Set up the click event listener for &apos;Center Map&apos;: Set the center of
            // the map
            // to the current center of the control.
            goCenterUI.addEventListener(&quot;click&quot;, function() {
                var currentCenter = control.getCenter();

                map.setCenter(currentCenter);
            });

            // Set up the click event listener for &apos;Set Center&apos;: Set the center of
            // the control to the current center of the map.
            setCenterUI.addEventListener(&quot;click&quot;, function() {
                var newCenter = map.getCenter();

                control.setCenter(newCenter);
            });
        }

        /**
        * Define a property to hold the center state.
        * @private
        */
        CenterControl.prototype.center_ = null;

        /**
        * Gets the map center.
        * @return {?google.maps.LatLng}
        */
        CenterControl.prototype.getCenter = function() {
            return this.center_;
        };

        /**
        * Sets the map center.
        * @param {?google.maps.LatLng} center
        */
        CenterControl.prototype.setCenter = function(center) {
            this.center_ = center;
        };

        function initMap() {
            map = new google.maps.Map(document.getElementById(&quot;map&quot;), {
                zoom: 12,
                center: surabaya
            });

            // Create the DIV to hold the control and call the CenterControl()
            // constructor passing in this DIV.
            var centerControlDiv = document.createElement(&quot;div&quot;);
            var centerControl = new CenterControl(centerControlDiv, map, surabaya);

            centerControlDiv.index = 1;
            centerControlDiv.style[&quot;padding-top&quot;] = &quot;10px&quot;;

            map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
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
