<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceController extends Controller
{
    public function geocoding()
    {
        return view('service.geocoding');
    }

    public function geocodingReverse()
    {
        return view('service.geocoding-reverse');
    }

    public function geocodingReversePlaceId()
    {
        return view('service.geocoding-reverse-placeid');
    }

    public function geocodingComponentRestrion()
    {
        return view('service.geocoding-component-restriction');
    }

    public function regionBiasingEs()
    {
        return view('service.region-biasing-es');
    }

    public function regionBiasingUs()
    {
        return view('service.region-biasing-us');
    }

    public function direction()
    {
        return view('service.direction');
    }

    public function directionPanel()
    {
        return view('service.direction-panel');
    }

    public function directionComplex()
    {
        return view('service.direction-complex');
    }

    public function travelMode()
    {
        return view('service.travel-mode');
    }

    public function waypoint()
    {
        return view('service.waypoint');
    }
}