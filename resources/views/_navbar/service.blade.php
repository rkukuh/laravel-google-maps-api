<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Service <span class="caret"></span>
    </a>
    <ul class="dropdown-menu multi-level">
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Geocoding</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('service.geocoding') }}">Geocoding simple</a></li>
                <li><a href="{{ route('service.geocoding-reverse') }}">Reverse Geocoding</a></li>
                <li><a href="{{ route('service.geocoding-reverse-placeid') }}">Reverse Geocoding by Place ID</a></li>
                <li><a href="{{ route('service.geocoding-component-restriction') }}">Geocoding Component Restriction</a></li>
            </ul>
        </li>

        <li class="divider"></li>
        <li><a href="{{ route('service.region-biasing-es') }}">Region code biasing (ES)</a></li>
        <li><a href="{{ route('service.region-biasing-us') }}">Region code biasing (US)</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('service.direction') }}">Direction</a></li>
        <li><a href="{{ route('service.direction-panel') }}">Direction with setPanel()</a></li>
        <li><a href="{{ route('service.direction-complex') }}">Direction (complex)</a></li>
        <li><a href="{{ route('service.travel-mode') }}">Travel Mode</a></li>
        <li><a href="{{ route('service.waypoint') }}">Waypoints</a></li>
        <li><a href="{{ route('service.direction-draggable') }}">Draggable direction</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('service.distance-matrix') }}">Distance Matrix</a></li>
        <li><a href="{{ route('service.elevation') }}">Elevation service</a></li>
        <li><a href="{{ route('service.elevation-path') }}">Showing elevation along path</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('service.streetview') }}">Street View container</a></li>
        <li><a href="{{ route('service.streetview-sidebyside') }}">Street View side-by-side</a></li>
        <li><a href="{{ route('service.streetview-overlay') }}">Overlays within street view</a></li>
    </ul>
</li>
