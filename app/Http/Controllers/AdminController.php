<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin/dashboard');
    }

    public function menu() {
        return view('admin/menu');
    }
    
    public function detail_menu() {
        return view('admin/detail-menu');
    }
}
