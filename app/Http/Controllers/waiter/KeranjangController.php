<?php

namespace App\Http\Controllers\waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Detail_order;
use App\Order;
use App\Menu;
use App\User;

class KeranjangController extends Controller
{
    public function index()
    {
        $user = User::where('id_user', session::get('id_user'))->first();
        $order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();
        $detail_orders = [];

        if (!empty($order)) {
            $detail_orders = Detail_order::where('id_order', $order->id_order)->get();
        }

        return view('waiter/keranjang', compact('user', 'order', 'detail_orders'));
    }

    public function konfirmasi(Request $request)
    {
        $no_meja = Order::where('no_meja', $request->no_meja)->first();

        if ($request->no_meja > 0) {
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
                return redirect('/waiter/keranjang')->with('pesanSuccess', "Pesanan anda telah di konfirmasi.");
            } else {
                return redirect('/waiter/keranjang')->with('pesanDanger', "Maaf, Meja yang anda pilih sudah di gunakan.");
            }
        } else if (empty($request->no_meja)) {
            return redirect('/waiter/keranjang')->with('pesanDanger', "Nomor meja wajib di isi!");
        } else {
            return redirect('/waiter/keranjang')->with('pesanDanger', "Nomor meja yang anda pilih tidak valid.");
        }
    }

    public function hapusOrder(Request $request)
    {
        $detail_order = Detail_order::where('id_detail_order', $request->id_detail_order)->first();
        $order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();

        if (empty(Order::where('id_order', $detail_order->id_order)->first())) {
            $order->delete();
        } else {
            $order->jumlah_harga = $order->jumlah_harga - $detail_order->sub_total;
            $order->update();
        }
        $detail_order->delete();

        return redirect('/waiter/keranjang')->with('pesanSuccess', "{$detail_order->menu['nama_menu']} berhasil di hapus.");
    }

    public function editOrder(Request $request)
    {
        $detail_order = Detail_order::where('id_detail_order', $request->id_detail_order)->first();

        if ($request->jumlah > $detail_order->menu->stok) {
            return redirect('/waiter/keranjang')->with('pesanDanger', "Mohon maaf, jumlah order anda melebihi stok yang tersedia. (Stok saat ini : {$detail_order->menu['stok']})");
        } else if ($request->jumlah < "1") {
            return redirect('/waiter/keranjang')->with('pesanDanger', "Tolong masukkan jumlah yang tepat.");
        }

        $order = Order::where('id_user', Session::get('id_user'))->where('status_order', "0")->first();
        if ($detail_order->jumlah < $request->jumlah) {
            $jumlah = $request->jumlah - $detail_order->jumlah;
            $order->jumlah_harga = $order->jumlah_harga + $detail_order->menu->harga * $jumlah;
            $order->update();
        } else {
            $jumlah = $detail_order->jumlah - $request->jumlah;
            $order->jumlah_harga = $order->jumlah_harga - $detail_order->menu->harga * $jumlah;
            $order->update();
        }

        $detail_order->jumlah = $request->jumlah;
        $detail_order->sub_total = $detail_order->menu->harga * $request->jumlah;
        $detail_order->update();

        return redirect('/waiter/keranjang')->with('pesanSuccess', "Jumlah Pesan {$detail_order->menu['nama_menu']} berhasil di ubah.");
    }
}
