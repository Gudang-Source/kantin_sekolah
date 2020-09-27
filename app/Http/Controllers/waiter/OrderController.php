<?php

namespace App\Http\Controllers\waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Detail_order;
use App\Menu;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $menu = Menu::paginate(6);
        return view('waiter/order', ['data_menu' => $menu]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->nama_menu;

        // mengambil data dari table pegawai sesuai pencarian data
        $menu = Menu::where('nama_menu', 'like', "%" . $cari . "%")->paginate(6);

        // mengirim data pegawai ke view index
        return view('waiter/order', ['data_menu' => $menu]);
    }

    public function order($id_menu)
    {
        $m = Menu::find($id_menu);
        return view('waiter/jumlah_order', ['menu' => $m]);
    }

    public function prosesOrder(Request $request, $id_menu)
    {
        $menu = Menu::where('id_menu', $id_menu)->first();
        $tanggal = Carbon::now();

        //Jika jumlah order melebihi Stok
        if ($request->jumlah_order > $menu->stok) {
            return redirect('order/' . $id_menu)->with('pesanDanger', "Mohon maaf, jumlah order anda melebihi stok yang tersedia.");
        }
        else if($request->jumlah_order < "1") {
            return redirect('order/' . $id_menu)->with('pesanDanger', "Tolong masukkan jumlah yang tepat.");
        }

        //Cek order
        $cek_order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();

        //Simpan ke tabel Orders
        if (empty($cek_order)) {
            $order = new Order;
            $order->no_meja = 0;
            $order->id_user = Session::get('id_user');
            $order->tanggal = $tanggal;
            $order->status_order = 0;
            $order->jumlah_harga = 0;
            $order->save();
        }

        //Get id_order
        $order_baru = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();

        //Cek Detail
        $detail_order = Detail_order::where('id_menu', $menu->id_menu)->where('id_order', $order_baru->id_order)->first();

        //Simpan ke tabel Detail_Orders
        if (empty($detail_order)) {
            $detail_order = new Detail_order;
            $detail_order->id_order = $order_baru->id_order;
            $detail_order->id_menu = $menu->id_menu;
            $detail_order->jumlah = $request->jumlah_order;
            $detail_order->sub_total = $menu->harga * $request->jumlah_order;
            $detail_order->status_detail_order = 0;
            $detail_order->save();
        } else {
            $detail_order->jumlah = $detail_order->jumlah + $request->jumlah_order;

            //Sub Total
            $harga_detail_oder = $menu->harga * $request->jumlah_order;
            $detail_order->sub_total = $detail_order->sub_total + $harga_detail_oder;
            $detail_order->update();

            //Stok Menu
            $menu->stok = $menu->stok - $request->jumlah_order;
            $menu->update();
        }

        //Total Harga
        $order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();
        $order->jumlah_harga = $order->jumlah_harga + $menu->harga * $request->jumlah_order;
        $order->update();

        return redirect('/order')->with('pesanSuccess', "Menu berhasil ditambahkan ke Keranjang.");
    }
}
