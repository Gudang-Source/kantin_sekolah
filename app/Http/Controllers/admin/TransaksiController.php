<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index() {
        $transaksi = Transaksi::all();
        return view('admin/transaksi', ['transaksis' => $transaksi]);
    }
}
