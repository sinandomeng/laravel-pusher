<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SBAdminController extends Controller
{
    public function index()
    {
        return view('sb-admin.dashboard');
    }
}
