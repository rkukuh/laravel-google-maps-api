<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StyleController extends Controller
{
    public function styledMap()
    {
        return view('style.map');
    }

    public function styledMapType()
    {
        return view('style.map-type');
    }
}
