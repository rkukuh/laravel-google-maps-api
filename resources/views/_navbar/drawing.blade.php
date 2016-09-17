<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Drawing <span class="caret"></span>
    </a>
    <ul class="dropdown-menu multi-level">
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Markers</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.simple-marker') }}">Simple marker</a></li>
                <li><a href="{{ route('drawing.marker-label') }}">Marker labels</a></li>
                <li><a href="{{ route('drawing.remove-marker') }}">Remove markers</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marker icons</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.simple-marker-icon') }}">Simple marker icon</a></li>
                <li><a href="{{ route('drawing.complex-marker-icon') }}">Complex marker icon</a></li>
                <li><a href="{{ route('drawing.custom-marker-icon') }}">Custom marker icon</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marker animations</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.marker-animation') }}">Marker animation</a></li>
                <li><a href="{{ route('drawing.marker-animation-timeout') }}">Marker animation with setTimeout()</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Symbols</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.predefined-marker') }}">Predefined markers (symbols)</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info windows</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.info-window') }}">Info window</a></li>
                <li><a href="{{ route('drawing.info-window-maxwidth') }}">Info window with maxWidth</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Polylines</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.simple-polyline') }}">Simple polylines</a></li>
                <li><a href="{{ route('drawing.removing-polyline') }}">Removing polylines</a></li>
                <li><a href="{{ route('drawing.complex-polyline') }}">Complex polylines</a></li>
                <li><a href="{{ route('drawing.deleting-vertex') }}">Deleting a vertex</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Polygons</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.simple-polygon') }}">Simple polygons</a></li>
                <li><a href="{{ route('drawing.polygon-array') }}">Polygon arrays</a></li>
                <li><a href="{{ route('drawing.polygon-auto-completion') }}">Polygon auto completion</a></li>
                <li><a href="{{ route('drawing.polygon-hole') }}">Polygon with hole</a></li>
                <li><a href="{{ route('drawing.polygon-draggable') }}">Draggable polygons</a></li>
            </ul>
        </li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shapes</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.circle') }}">Circle</a></li>
                <li><a href="{{ route('drawing.rectangle') }}">Rectangle</a></li>
                <li><a href="{{ route('drawing.rectangle-zoom') }}">Rectangle zoom</a></li>
                <li><a href="{{ route('drawing.editable-shape') }}">User-editable shape</a></li>
                <li><a href="{{ route('drawing.shape-event') }}">Rectangle (shape)'s event</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        <li class="dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Overlays</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('drawing.ground-overlay') }}">Ground overlay</a></li>
                <li><a href="{{ route('drawing.remove-overlay') }}">Removing overlay</a></li>
                <li><a href="{{ route('drawing.custom-overlay') }}">Custom overlay</a></li>
                <li><a href="{{ route('drawing.show-hide-overlay') }}">Show/Hide overlay</a></li>
            </ul>
        </li>
    </ul>
</li>
