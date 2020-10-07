<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index() {
        $user = User::where('id_user', session::get('id_user'))->first();
        $transaksi = Transaksi::all();
        return view('admin/transaksi', compact('user', 'transaksi'));
    }
}
