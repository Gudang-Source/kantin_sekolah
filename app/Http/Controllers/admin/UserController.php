<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{
    public function index() {
        $user = User::where('id_user', Session::get('id_user'))->first();
        $allUser = User::where('status', "Aktif")->orWhere('status', "Nonaktif")->get();
        return view('admin/user', compact('user', 'allUser'));
    }

    public function waiting() {
        $user = User::where('id_user', Session::get('id_user'))->first();
        $allUser = User::where('status', "Menunggu")->get();
        return view('admin/user', compact('user', 'allUser'));
    }

    public function edit() {
        //
    }

    public function destroy() {
        //
    }
}
