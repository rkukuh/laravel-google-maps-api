<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ControlController extends Controller
{
    public function defaultController()
    {
        return view('control.default');
    }
}
