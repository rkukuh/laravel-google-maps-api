@extends('layouts.app')

@section('title', 'Custom overlay')

@section('content')
    <h1>
        @include('_shared.button-source-code')

        Custom overlay
    </h1>

    <div id="map"></div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}"></script>

    <script>
        var overlay;
        USGSOverlay.prototype = new google.maps.OverlayView();

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom        : 11,
                center      : {lat: 62.323907, lng: -150.109291},
                mapTypeId   : 'satellite'
            });

            var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(62.281819, -150.287132),
                new google.maps.LatLng(62.400471, -150.005608)
            );

            var srcImage = 'https://developers.google.com/maps/documentation/' +
            'javascript/examples/full/images/talkeetna.png';

            overlay = new USGSOverlay(bounds, srcImage, map);
        }

        function USGSOverlay(bounds, image, map) {
            this.bounds_    = bounds;
            this.image_     = image;
            this.map_       = map;

            this.div_ = null;

            this.setMap(map);
        }

        USGSOverlay.prototype.onAdd = function() {
            var div = document.createElement('div');

            div.style.borderStyle   = 'none';
            div.style.borderWidth   = '0px';
            div.style.position      = 'absolute';

            var img = document.createElement('img');

            img.src             = this.image_;
            img.style.width     = '100%';
            img.style.height    = '100%';
            img.style.position  = 'absolute';

            div.appendChild(img);

            this.div_ = div;

            var panes = this.getPanes();

            panes.overlayLayer.appendChild(div);
        };

        USGSOverlay.prototype.draw = function() {
            var overlayProjection = this.getProjection();

            var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
            var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

            var div = this.div_;

            div.style.left      = sw.x + 'px';
            div.style.top       = ne.y + 'px';
            div.style.width     = (ne.x - sw.x) + 'px';
            div.style.height    = (sw.y - ne.y) + 'px';
        };

        USGSOverlay.prototype.onRemove = function() {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
        };

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
@endpush


@section('source-code-javascript')

    &lt;script src=&quot;https://maps.googleapis.com/maps/api/js?key={{ $browser_key_placeholder }}&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        // This example creates a custom overlay called USGSOverlay, containing
        // a U.S. Geological Survey (USGS) image of the relevant area on the map.

        // Set the custom overlay object&apos;s prototype to a new instance
        // of OverlayView. In effect, this will subclass the overlay class therefore
        // it&apos;s simpler to load the API synchronously, using
        // google.maps.event.addDomListener().
        // Note that we set the prototype to an instance, rather than the
        // parent class itself, because we do not wish to modify the parent class.

        var overlay;
        USGSOverlay.prototype = new google.maps.OverlayView();

        function initMap() {
            var map = new google.maps.Map(document.getElementById(&apos;map&apos;), {
                zoom        : 11,
                center      : {lat: 62.323907, lng: -150.109291},
                mapTypeId   : &apos;satellite&apos;
            });

            var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(62.281819, -150.287132),
                new google.maps.LatLng(62.400471, -150.005608)
            );

            // The photograph is courtesy of the U.S. Geological Survey.
            var srcImage = &apos;https://developers.google.com/maps/documentation/&apos; +
            &apos;javascript/examples/full/images/talkeetna.png&apos;;

            // The custom USGSOverlay object contains the USGS image,
            // the bounds of the image, and a reference to the map.
            overlay = new USGSOverlay(bounds, srcImage, map);
        }

        function USGSOverlay(bounds, image, map) {
            // Initialize all properties.
            this.bounds_    = bounds;
            this.image_     = image;
            this.map_       = map;

            // Define a property to hold the image&apos;s div. We&apos;ll
            // actually create this div upon receipt of the onAdd()
            // method so we&apos;ll leave it null for now.
            this.div_ = null;

            // Explicitly call setMap on this overlay.
            this.setMap(map);
        }

        /**
        * onAdd is called when the map&apos;s panes are ready and the overlay has been
        * added to the map.
        */
        USGSOverlay.prototype.onAdd = function() {
            var div = document.createElement(&apos;div&apos;);

            div.style.borderStyle   = &apos;none&apos;;
            div.style.borderWidth   = &apos;0px&apos;;
            div.style.position      = &apos;absolute&apos;;

            // Create the img element and attach it to the div.
            var img = document.createElement(&apos;img&apos;);

            img.src             = this.image_;
            img.style.width     = &apos;100%&apos;;
            img.style.height    = &apos;100%&apos;;
            img.style.position  = &apos;absolute&apos;;

            div.appendChild(img);

            this.div_ = div;

            // Add the element to the &quot;overlayLayer&quot; pane.
            var panes = this.getPanes();

            panes.overlayLayer.appendChild(div);
        };

        USGSOverlay.prototype.draw = function() {
            // We use the south-west and north-east
            // coordinates of the overlay to peg it to the correct position and size.
            // To do this, we need to retrieve the projection from the overlay.
            var overlayProjection = this.getProjection();

            // Retrieve the south-west and north-east coordinates of this overlay
            // in LatLngs and convert them to pixel coordinates.
            // We&apos;ll use these coordinates to resize the div.
            var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
            var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

            // Resize the image&apos;s div to fit the indicated dimensions.
            var div = this.div_;

            div.style.left      = sw.x + &apos;px&apos;;
            div.style.top       = ne.y + &apos;px&apos;;
            div.style.width     = (ne.x - sw.x) + &apos;px&apos;;
            div.style.height    = (sw.y - ne.y) + &apos;px&apos;;
        };

        // The onRemove() method will be called automatically from the API if
        // we ever set the overlay&apos;s map property to &apos;null&apos;.
        USGSOverlay.prototype.onRemove = function() {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
        };

        google.maps.event.addDomListener(window, &apos;load&apos;, initMap);
    &lt;/script&gt;
@endsection

@section('source-code-css')
    #map { height: 500px; }
@endsection

@section('source-code-html')
    <div id="map"></div>
@endsection
