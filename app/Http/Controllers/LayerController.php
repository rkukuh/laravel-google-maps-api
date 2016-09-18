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
}
