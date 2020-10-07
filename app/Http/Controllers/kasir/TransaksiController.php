<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Detail_order;
use App\Transaksi;
use App\User;
use \Barryvdh\DomPDF\Facade as PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = User::where('id_user', session::get('id_user'))->first();
        $transaksis = Transaksi::all();
        return view('kasir/transaksi', compact('user', 'transaksis'));
    }

    public function show($id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->get();
        $get_id = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $detail_order = Detail_order::where('status_detail_order', "Selesai")->where('id_order', $get_id->id_order)->get();
        $order = Order::where('id_order', $get_id->id_order)->get();
        return view('kasir/view-transaksi', ['transaksis' => $transaksi, 'detail_orders' => $detail_order, 'orders' => $order]);
    }

    public function print($id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->get();
        $get_id = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $detail_order = Detail_order::where('status_detail_order', "Selesai")->where('id_order', $get_id->id_order)->get();
        $order = Order::where('id_order', $get_id->id_order)->get();

        $pdf = PDF::loadview('cetak/cetak-transaksi', ['transaksis' => $transaksi, 'detail_orders' => $detail_order, 'orders' => $order])->setPaper('A4','potrait');
        return $pdf->stream('invoice-KantinKu - '.$id_transaksi);
    }

    public function printAll()
    {
        $transaksi = Transaksi::all();

        $pdf = PDF::loadview('cetak/cetak-allTransaksi', ['transaksis' => $transaksi])->setPaper('A4','potrait');
        return $pdf->stream('Report Transaksi');
    }
}
