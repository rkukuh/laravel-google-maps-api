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
}
