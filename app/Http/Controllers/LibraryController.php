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
}
