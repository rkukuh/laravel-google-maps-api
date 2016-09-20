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

    public function dataStyling()
    {
        return view('layer.data-styling');
    }

    public function dataEvent()
    {
        return view('layer.data-event');
    }

    public function dataDynamic()
    {
        return view('layer.data-dynamic');
    }

    public function dataPolygon()
    {
        return view('layer.data-polygon');
    }

    public function dataDragDropGeoJson()
    {
        return view('layer.data-dragdrop-geojson');
    }

    public function dataEarthquake()
    {
        return view('layer.data-earthquake');
    }
}
