<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Service <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('service.geocoding') }}">Geocoding</a></li>
        <li><a href="{{ route('service.geocoding-reverse') }}">Reverse Geocoding</a></li>
        <li><a href="{{ route('service.geocoding-reverse-placeid') }}">Reverse Geocoding by Place ID</a></li>
        <li><a href="{{ route('service.geocoding-component-restriction') }}">Geocoding Component Restriction</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('service.region-biasing-es') }}">Region code biasing (ES)</a></li>
    </ul>
</li>
