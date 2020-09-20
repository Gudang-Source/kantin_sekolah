<?php

namespace App\Http\Controllers;

use App\Detail_order;
use App\Menu;
use App\Order;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order($id_menu)
    {
        $m = Menu::find($id_menu);
        return view('kantin/order', ['menu' => $m]);
    }

    public function prosesOrder(Request $request, $id_menu)
    {
        $menu = Menu::where('id_menu', $id_menu)->first();
        $tanggal = Carbon::now();

        //Jika jumlah pesan melebihi Stok
        if ($request->jumlah_pesan > $menu->stok) {
            return redirect('order/' . $id_menu)->with('pesanDanger', "Mohon maaf, jumlah pesanan anda melebihi stok yang tersedia.");
        }

        //Cek order
        $cek_order = Order::where('id_user', Session::get('id_user'))->first();

        //Simpan ke tabel Orders
        if (empty($cek_order)) {
            $order = new Order;
            $order->no_meja = 0;
            $order->id_user = Session::get('id_user');
            $order->tanggal = $tanggal;
            $order->status_order = "Belum Bayar";
            $order->jumlah_harga = 0;
            $order->save();
        }

        //Get id_order
        $order_baru = Order::where('id_user', Session::get('id_user'))->first();
        
        //Cek Detail
        $detail_order = Detail_order::where('id_menu', $menu->id_menu)->where('id_order', $order_baru->id_order)->first();
        
        //Simpan ke tabel Detail_Orders
        if(empty($detail_order)) {
            $detail_order = new Detail_order;
            $detail_order->id_order = $order_baru->id_order;
            $detail_order->id_menu = $menu->id_menu;
            $detail_order->jumlah = $request->jumlah_pesan;
            $detail_order->sub_total = $menu->harga * $request->jumlah_pesan;
            $detail_order->status_detail_order = "Belum Bayar";
            $detail_order->save();
        }
        else {
            $detail_order->jumlah = $detail_order->jumlah + $request->jumlah_pesan;

            //Sub Total
            $harga_detail_oder = $menu->harga * $request->jumlah_pesan;
            $detail_order->sub_total = $detail_order->sub_total + $harga_detail_oder;
            $detail_order->update();
        }

        //Total Harga
        $order = Order::where('id_user', Session::get('id_user'))->first();
        $order->jumlah_harga = $order->jumlah_harga + $menu->harga * $request->jumlah_pesan;
        $order->update();

        return redirect('/home');
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
