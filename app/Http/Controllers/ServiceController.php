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
}
