<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BasicController extends Controller
{
    public function simple()
    {
        return view('basic.simple');
    }

    public function mapCoordinates()
    {
        return view('basic.coordinates');
    }

    public function mapGeolocation()
    {
        return view('basic.geolocation');
    }

    public function mapLanguage()
    {
        return view('basic.language');
    }

    public function mapRtl()
    {
        return view('basic.rtl');
    }
}
