<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('status_order', "Proses")->get();
        return view('kasir/order', compact('orders'));
    }

    public function bayar() {
        //
    }
}
