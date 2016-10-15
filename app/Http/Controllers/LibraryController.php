<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LibraryController extends Controller
{
    public function drawing()
    {
        return view('library.drawing');
    }

    public function geometryNavigation()
    {
        return view('library.geometry-navigation');
    }

    public function geometryEncoding()
    {
        return view('library.geometry-encoding');
    }

    public function geometryContainsLocation()
    {
        return view('library.geometry-location');
    }

    public function placeSearch()
    {
        return view('library.places-search');
    }

    public function placeDetail()
    {
        return view('library.places-detail');
    }

    public function placeSearchPagination()
    {
        return view('library.places-search-pagination');
    }

    public function placeRadarSearch()
    {
        return view('library.places-radar-search');
    }

    public function placeAutocomplete()
    {
        return view('library.places-autocomplete');
    }

    public function placeAutocompleteAddress()
    {
        return view('library.places-autocomplete-address');
    }

    public function placeAutocompleteHotel()
    {
        return view('library.places-autocomplete-hotel');
    }

    public function placeSearchBox()
    {
        return view('library.places-search-box');
    }
}
