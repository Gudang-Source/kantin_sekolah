<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Detail_order;
use App\Order;

class KeranjangController extends Controller
{
    public function index() {
        $order = Order::where('id_user', Session::get('id_user'))->first();
        $detail_orders =[];

        if(!empty($order)) {
            $detail_orders = Detail_order::where('id_order', $order->id_order)->get();
        }
        
        return view('kasir/keranjang', compact('order', 'detail_orders'));
    }
}
