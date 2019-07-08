<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiliPayController extends Controller
{
    public function index()
    {
        return view('filipay.index');
    }
}
