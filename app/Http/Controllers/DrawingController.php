<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DrawingController extends Controller
{
    public function simpleMarker()
    {
        return view('drawing.simple-marker');
    }
}
