<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Menu;
use App\User;
use App\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::count();
        $user = User::count();
        $transaksi = Transaksi::count();

        return view('admin/dashboard', compact('menu', 'user', 'transaksi'));
    }
}
