@extends('layouts.app')

@section('title', 'Custom Save Widget')

@section('content')
    <h1>Custom Save Widget</h1>

    <div id="map"></div>

    <div id="save-widget">
        <strong>Google Sydney</strong>

        <p>We’re located on the water in Pyrmont, with views of the Sydney Harbour Bridge, The
        Rocks and Darling Harbour. Our building is the greenest in Sydney. Inside, we have a
        "living wall" made of plants, a tire swing, a library with a nap pod and some amazing
        baristas.</p>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        #save-widget {
            width: 300px;
            box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px;
            background-color: white;
            padding: 10px;
            font-family: Roboto, Arial;
            font-size: 13px;
            margin: 15px;
        }
    </style>
@endpush

@push('js')
<script>
    /*
    * This sample uses a custom control to display the SaveWidget. Custom
    * controls can be used in place of the default Info Window to create a
    * custom UI.
    * This sample uses a Place ID to reference Google Sydney. Place IDs are
    * stable values that uniquely reference a place on a Google Map and are
    * documented in detail at:
    * https://developers.google.com/maps/documentation/javascript/places#placeid
    */

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: -33.8666, lng: 151.1958},
            mapTypeControlOptions: {
                mapTypeIds: [
                    'roadmap',
                    'satellite'
                ],
                position: google.maps.ControlPosition.BOTTOM_LEFT
            }
        });

        var widgetDiv = document.getElementById('save-widget');

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(widgetDiv);

        // Append a Save Control to the existing save-widget div.
        var saveWidget = new google.maps.SaveWidget(widgetDiv, {
            place: {
                // ChIJN1t_tDeuEmsRUsoyG83frY4 is the place Id for Google Sydney.
                placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4',
                location: {lat: -33.866647, lng: 151.195886}
            },
            attribution: {
                source: 'Google Maps JavaScript API',
                webUrl: 'https://developers.google.com/maps/'
            }
        });

        var marker = new google.maps.Marker({
            map: map,
            position: saveWidget.getPlace().location
        });
    }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&signed_in=true&callback=initMap"></script>
@endpush
