<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;

class KantinController extends Controller
{
    public function index() {
        $allMenu = Menu::all();
        return view('index', ['data_menu' => $allMenu]);
    }

    public function keranjang() {
        return view('keranjang');
    }
}
