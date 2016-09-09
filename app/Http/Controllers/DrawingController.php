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

    public function markerLabel()
    {
        return view('drawing.marker-label');
    }

    public function removeMarker()
    {
        return view('drawing.remove-marker');
    }

    public function simpleMarkerIcon()
    {
        return view('drawing.simple-marker-icon');
    }

    public function complexMarkerIcon()
    {
        return view('drawing.complex-marker-icon');
    }

    public function markerAnimation()
    {
        return view('drawing.marker-animation');
    }

    public function markerAnimationTimeout()
    {
        return view('drawing.marker-animation-timeout');
    }
}
