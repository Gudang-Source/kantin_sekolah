<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Menu;
use App\User;
use App\Transaksi;
use App\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('id_user', session::get('id_user'))->first();
        $menu = Menu::count();
        $jumlah_user = User::count();
        $transaksi = Transaksi::count();
        $order = Order::sum('jumlah_harga');

        return view('admin/dashboard', compact('user','menu', 'jumlah_user', 'transaksi', 'order'));
    }
}
