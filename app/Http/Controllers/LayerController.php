<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LayerController extends Controller
{
    public function kml()
    {
        return view('layer.kml');
    }

    public function kmlFeature()
    {
        return view('layer.kml-feature');
    }

    public function dataSimple()
    {
        return view('layer.data-simple');
    }

    public function dataPolygon()
    {
        return view('layer.data-polygon');
    }
}
