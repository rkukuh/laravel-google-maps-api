@extends('layouts.app')

@section('title', 'Autocomplete address form')

@section('content')
    <h1>Autocomplete address form</h1>

    <div class="col-md-6" id="form_address">
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="autocomplete"
                        onFocus="geolocate()" placeholder="Enter full address here...">
                </div>
            </div>
            <div class="form-group">
                <label for="street_number" class="col-md-3 control-label">Street Address</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="street_number">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="route">
                </div>
            </div>
            <div class="form-group">
                <label for="locality" class="col-md-3 control-label">City</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="locality">
                </div>
            </div>
            <div class="form-group">
                <label for="administrative_area_level_1" class="col-md-3 control-label">State</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="administrative_area_level_1">
                </div>

                <label for="postal_code" class="col-md-1 control-label">Zip</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="postal_code">
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-md-3 control-label">Country</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="country">
                </div>
            </div>
        </form>
    </div>
@endsection

@push('css')
    <style>
        #form_address { margin-top: 40px;}
    </style>
@endpush

@push('js')
    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;

        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']}
            );

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];

                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];

                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });

                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ $browser_key }}&libraries=places&callback=initAutocomplete"></script>
@endpush
