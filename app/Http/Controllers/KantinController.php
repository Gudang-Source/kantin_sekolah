<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Menu;
use App\Detail_order;
use App\Order;

class KantinController extends Controller
{
    public function index() {
        $allMenu = Menu::all();
        return view('kantin/index', ['data_menu' => $allMenu]);
    }

    public function keranjang() {
        $order = Order::where('id_user', Session::get('id_user'))->first();
        $detail_orders =[];

        if(!empty($order)) {
            $detail_orders = Detail_order::where('id_order', $order->id_order)->get();
        }
        
        return view('kantin/keranjang', compact('order', 'detail_orders'));
    }
}
