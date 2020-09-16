<?php

namespace App\Http\Controllers\auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('admin/dashboard');
        }
        else {
            return redirect()->back()->with('pesanDanger', "Email atau Password Anda Salah!");
        }
        
    }

    public function prosesRegister(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'id_level' => 'required',
            'gambar' => 'required',
        ]);

        $menu = new User();
        $menu->nama = $validateData['nama'];
        $menu->email = $validateData['email'];
        $menu->password = bcrypt($validateData['password']);
        $menu->id_level = $validateData['id_level'];
        if ($files = $request->file('gambar')) {
            $destinationPath = 'assets/img/user/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $menu->gambar = "$profileImage";
        }
        $menu->save();

        return redirect()->route('auth.login')->with('pesanSuccess', "Selamat! Akun {$validateData['nama']} berhasil di Dibuat!");
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/home');
    }
}
