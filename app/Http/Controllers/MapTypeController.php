<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MapTypeController extends Controller
{
    public function basic()
    {
        return view('maptype.basic');
    }
}
