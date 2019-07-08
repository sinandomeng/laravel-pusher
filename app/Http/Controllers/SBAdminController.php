<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SBAdminController extends Controller
{
    public function index() {
        return view('sb-admin.dashboard');
    }

    public function buttons() {
        return view('sb-admin.buttons');
    }

    public function cards() {
        return view('sb-admin.cards');
    }

    public function colors() {
        return view('sb-admin.colors');
    }

    public function borders() {
        return view('sb-admin.borders');
    }

    public function animations() {
        return view('sb-admin.animations');
    }

    public function other() {
        return view('sb-admin.other');
    }

    public function login() {
        return view('sb-admin.login');
    }

    public function register() {
        return view('sb-admin.register');
    }

    public function forgotPassword() {
        return view('sb-admin.forgot-password');
    }

    public function error() {
        return view('sb-admin.error');
    }

    public function blank() {
        return view('sb-admin.blank');
    }

    public function charts() {
        return view('sb-admin.charts');
    }

    public function tables() {
        return view('sb-admin.tables');
    }
}
