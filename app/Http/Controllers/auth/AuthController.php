<?php

namespace App\Http\Controllers\auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data && Hash::Check($password, $data->password)) {
            Session::put('id_user', $data->id_user);
            Session::put('nama', $data->nama);
            Session::put('email', $data->email);
            Session::put('id_level', $data->id_level);
            Session::put('gambar', $data->gambar);
            if ($data->id_level == "1") {
                return redirect()->route('admin');
            } else if ($data->id_level == "2") {
                return redirect()->route('kantin.index');
            }
        } else {
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

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('auth.login');
    }
}
