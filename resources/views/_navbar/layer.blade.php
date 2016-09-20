<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Layers <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('layer.kml') }}">KML Layers</a></li>
        <li><a href="{{ route('layer.kml-feature') }}">KML feature detail</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('layer.data-simple') }}">Data Layer: Simple</a></li>
        <li><a href="{{ route('layer.data-styling') }}">Data Layer: Styling</a></li>
        <li><a href="{{ route('layer.data-event') }}">Data Layer: Event</a></li>
        <li><a href="{{ route('layer.data-dynamic') }}">Data Layer: Dynamic Styling</a></li>
        <li><a href="{{ route('layer.data-polygon') }}">Data Layer: Polygon</a></li>
        <li><a href="{{ route('layer.data-dragdrop-geojson') }}">Data Layer: Drag-Drop GeoJson</a></li>
        <li><a href="{{ route('layer.data-earthquake') }}">Data Layer: Earthquake</a></li>
        <li><a href="{{ route('layer.heatmap') }}">Heatmap</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('layer.fusion-table-layer') }}">Fusion Table: Layer</a></li>
        <li><a href="{{ route('layer.fusion-table-query') }}">Fusion Table: Query</a></li>
        <li><a href="{{ route('layer.fusion-table-heatmap') }}">Fusion Table: Heatmap</a></li>
        <li><a href="{{ route('layer.fusion-table-styling') }}">Fusion Table: Styling</a></li>
    </ul>
</li>
