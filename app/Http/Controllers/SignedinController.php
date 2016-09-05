<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SignedinController extends Controller
{
    public function signedIn()
    {
        return view('signedin.signedin');
    }
}
