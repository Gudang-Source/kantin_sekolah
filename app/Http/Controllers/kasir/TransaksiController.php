<?php

namespace App\Http\Controllers\kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index() {
        $transaksi = Transaksi::all();
        return view('kasir/transaksi', ['transaksis' => $transaksi]);
    }
}
