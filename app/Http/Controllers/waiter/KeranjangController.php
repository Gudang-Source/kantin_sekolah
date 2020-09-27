<?php

namespace App\Http\Controllers\waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Detail_order;
use App\Order;
use App\Menu;

class KeranjangController extends Controller
{
    public function index()
    {
        $order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();
        $detail_orders = [];

        if (!empty($order)) {
            $detail_orders = Detail_order::where('id_order', $order->id_order)->get();
        }

        return view('waiter/keranjang', compact('order', 'detail_orders'));
    }

    public function konfirmasi(Request $request)
    {
        $no_meja = Order::where('no_meja', $request->no_meja)->first();

        if (empty($no_meja)) {
            $order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();
            $id_order = $order->id_order;

            $order->status_order = "Proses";
            $order->no_meja = $request->no_meja;
            $order->update();

            $detail_orders = Detail_order::where('id_order', $id_order)->get();
            foreach ($detail_orders as $detail_order) {
                $detail_order->status_detail_order = "Proses";
                $detail_order->update();

                $menu = Menu::where('id_menu', $detail_order->id_menu)->first();
                $menu->stok = $menu->stok - $detail_order->jumlah;
                $menu->update();
            }
            return redirect('/keranjang')->with('pesanSuccess', "Pesanan anda telah di konfirmasi.");
        } else {
            return redirect('/keranjang')->with('pesanDanger', "Maaf, Meja yang anda pilih sudah di gunakan.");
        }
    }
}
