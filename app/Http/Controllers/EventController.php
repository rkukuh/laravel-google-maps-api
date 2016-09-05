<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    public function simpleClick()
    {
        return view('event.simple-click');
    }

    public function eventClosure()
    {
        return view('event.closure');
    }
}
