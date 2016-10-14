@extends('layouts.app')

@section('title', 'Autocomplete hotel search')

@section('content')
    <h1>Autocomplete hotel search</h1>

    <div id="findhotels">
        Find hotels in:
    </div>

    <div id="locationField">
        <input id="autocomplete" placeholder="Enter a city" type="text" />
    </div>

    <div id="controls">
        <select id="country">
            <option value="all">All</option>
            <option value="au">Australia</option>
            <option value="br">Brazil</option>
            <option value="ca">Canada</option>
            <option value="fr">France</option>
            <option value="de">Germany</option>
            <option value="mx">Mexico</option>
            <option value="nz">New Zealand</option>
            <option value="it">Italy</option>
            <option value="za">South Africa</option>
            <option value="es">Spain</option>
            <option value="pt">Portugal</option>
            <option value="us" selected>U.S.A.</option>
            <option value="uk">United Kingdom</option>
        </select>
    </div>

    <div id="map"></div>

    <div id="listing">
      <table id="resultsTable">
        <tbody id="results"></tbody>
      </table>
    </div>

    <div style="display: none">
        <div id="info-content">
            <table>
                <tr id="iw-url-row" class="iw_table_row">
                    <td id="iw-icon" class="iw_table_icon"></td>
                    <td id="iw-url"></td>
                </tr>
                <tr id="iw-address-row" class="iw_table_row">
                    <td class="iw_attribute_name">Address:</td>
                    <td id="iw-address"></td>
                </tr>
                <tr id="iw-phone-row" class="iw_table_row">
                    <td class="iw_attribute_name">Telephone:</td>
                    <td id="iw-phone"></td>
                </tr>
                <tr id="iw-rating-row" class="iw_table_row">
                    <td class="iw_attribute_name">Rating:</td>
                    <td id="iw-rating"></td>
                </tr>
                <tr id="iw-website-row" class="iw_table_row">
                    <td class="iw_attribute_name">Website:</td>
                    <td id="iw-website"></td>
                </tr>
            </table>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #map { height: 500px; }

        table {
        font-size: 12px;
      }
      #listing {
        position: absolute;
        width: 200px;
        height: 470px;
        overflow: auto;
        left: 442px;
        top: 0px;
        cursor: pointer;
        overflow-x: hidden;
      }
      #findhotels {
        position: absolute;
        text-align: right;
        width: 100px;
        font-size: 14px;
        padding: 4px;
        z-index: 5;
        background-color: #fff;
      }
      #locationField {
        position: absolute;
        width: 190px;
        height: 25px;
        left: 108px;
        top: 0px;
        z-index: 5;
        background-color: #fff;
      }
      #controls {
        position: absolute;
        left: 300px;
        width: 140px;
        top: 0px;
        z-index: 5;
        background-color: #fff;
      }
      #autocomplete {
        width: 100%;
      }
      #country {
        width: 100%;
      }
      .placeIcon {
        width: 20px;
        height: 34px;
        margin: 4px;
      }
      .hotelIcon {
        width: 24px;
        height: 24px;
      }
      #resultsTable {
        border-collapse: collapse;
        width: 240px;
      }
      #rating {
        font-size: 13px;
        font-family: Arial Unicode MS;
      }
      .iw_table_row {
        height: 18px;
      }
      .iw_attribute_name {
        font-weight: bold;
        text-align: right;
      }
      .iw_table_icon {
        text-align: right;
      }
    </style>
@endpush

@push('js')
    <script>
        //
    </script>

    //
@endpush
