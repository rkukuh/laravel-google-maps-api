@extends('layouts.app')

@section('title', 'Synchronous Loading')

@section('content')
    <h1>Synchronous Loading</h1>

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
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
    });
</script>
@endpush
