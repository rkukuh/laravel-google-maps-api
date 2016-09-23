<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MapTypeController extends Controller
{
    public function basic()
    {
        return view('maptype.basic');
    }

    public function overlay()
    {
        return view('maptype.overlay');
    }

    public function image()
    {
        return view('maptype.image');
    }
}
