<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KantinController extends Controller
{
    public function index() {
        return view('index');
    }

    public function auth() {
        return view('auth');
    }
}
