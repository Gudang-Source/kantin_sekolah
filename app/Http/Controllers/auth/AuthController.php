<?php

namespace App\Http\Controllers\auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function prosesLogin(Request $request)
    {
        echo "yoyoy";
    }

    public function prosesRegister(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'gambar' => 'required',
        ]);

        $user = new User();
        $user->nama = $validateData['nama'];
        $user->email = $validateData['email'];
        $user->password = bcrypt($validateData['password']);
        if ($files = $request->file('gambar')) {
            $destinationPath = 'assets/img/user/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $user->gambar = "$profileImage";
        }
        $user->save();

        return redirect()->route('auth')->with('pesanSuccess', "Akun  {$validateData['nama']} berhasil di Dibuat!");
    }
}
