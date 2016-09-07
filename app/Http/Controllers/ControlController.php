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

    public function disableUi()
    {
        return view('control.disable-ui');
    }

    public function addControl()
    {
        return view('control.add-control');
    }

    public function options()
    {
        return view('control.options');
    }

    public function positioning()
    {
        return view('control.positioning');
    }
}
