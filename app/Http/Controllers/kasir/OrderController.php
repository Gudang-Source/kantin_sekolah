<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function index() {
        $user = User::where('id_user', session::get('id_user'))->first();
        $orders = Order::where('status_order', "Proses")->get();
        return view('kasir/order', compact('user','orders'));
    }

    public function bayar() {
        //
    }
}
