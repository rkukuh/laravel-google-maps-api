@extends('layouts.app')

@section('title', 'Simple Map')

@section('content')
    <h1>
        <button type="button" class="btn btn-primary"
                data-toggle="modal" data-target="#source_code">
            <strong>&lt;/&gt;</strong>
        </button>

        Simple Map
    </h1>

    <div id="map"></div>
@endsection

@section('source-code-modal')
    <div class="modal fade" id="source_code">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Source Code</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#javascript" data-toggle="tab">Javascript</a></li>
                            <li><a href="#css" data-toggle="tab">CSS</a></li>
                            <li><a href="#html" data-toggle="tab">HTML</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="javascript">
                                javascript
                            </div>
                            <div class="tab-pane" id="css">
                                css
                            </div>
                            <div class="tab-pane" id="html">
                                html
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }
    </style>
@endpush

@push('js')
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&callback=initMap"></script>
@endpush
