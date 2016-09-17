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

    public function infoWindow()
    {
        return view('drawing.info-window');
    }

    public function infoWindowMaxwidth()
    {
        return view('drawing.info-window-maxwidth');
    }

    public function simplePolyline()
    {
        return view('drawing.simple-polyline');
    }

    public function removingPolyline()
    {
        return view('drawing.removing-polyline');
    }

    public function complexPolyline()
    {
        return view('drawing.complex-polyline');
    }

    public function deletingVertex()
    {
        return view('drawing.deleting-vertex');
    }

    public function simplePolygon()
    {
        return view('drawing.simple-polygon');
    }

    public function polygonArray()
    {
        return view('drawing.polygon-array');
    }

    public function polygonAutoCompletion()
    {
        return view('drawing.polygon-auto-completion');
    }

    public function polygonHole()
    {
        return view('drawing.polygon-hole');
    }

    public function polygonDraggable()
    {
        return view('drawing.polygon-draggable');
    }

    public function circle()
    {
        return view('drawing.circle');
    }

    public function rectangle()
    {
        return view('drawing.rectangle');
    }

    public function rectangleZoom()
    {
        return view('drawing.rectangle-zoom');
    }

    public function editableShape()
    {
        return view('drawing.editable-shape');
    }

    public function shapeEvent()
    {
        return view('drawing.shape-event');
    }

    public function groundOverlay()
    {
        return view('drawing.ground-overlay');
    }

    public function removeOverlay()
    {
        return view('drawing.remove-overlay');
    }
}
