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

    public function heatMap()
    {
        return view('layer.heatmap');
    }

    public function fusionTableLayer()
    {
        return view('layer.fusion-table-layer');
    }

    public function fusionTableQuery()
    {
        return view('layer.fusion-table-query');
    }

    public function fusionTableHeatmap()
    {
        return view('layer.fusion-table-heatmap');
    }

    public function fusionTableStyling()
    {
        return view('layer.fusion-table-styling');
    }

    public function geoRss()
    {
        return view('layer.geo-rss');
    }

    public function traffic()
    {
        return view('layer.traffic');
    }

    public function transit()
    {
        return view('layer.transit');
    }

    public function bicycling()
    {
        return view('layer.bicycling');
    }
}
