<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function index() {
        return view('kasir/index');
    }
}
