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
            Session::put('password', $data->password);
            Session::put('id_level', $data->id_level);
            Session::put('gambar', $data->gambar);

            session(['berhasil_login' => true]);
            if ($data->id_level == "0") {
                return redirect()->route('index');
            } else if ($data->id_level == "1") {
                return redirect()->route('admin.index');
            } else if ($data->id_level == "2") {
                return redirect()->route('waiter.order');
            } else if ($data->id_level == "3") {
                return redirect()->route('kasir.order');
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
            'gambar' => 'required',
        ]);

        $user = new User();
        $user->nama = $validateData['nama'];
        $user->email = $validateData['email'];
        $user->password = bcrypt($validateData['password']);
        $user->id_level = 0;
        $user->status = "Menunggu";
        if ($files = $request->file('gambar')) {
            $destinationPath = 'assets/img/user/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $user->gambar = "$profileImage";
        }
        $user->save();

        return redirect()->route('auth.login')->with('pesanSuccess', "Selamat! Akun {$validateData['nama']} berhasil di Dibuat!");
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('auth.login')->with('pesanSuccess', "Anda telah keluar!");
    }

    public function lupaPassword()
    {
        return view('auth/forgot-password');
    }

    public function cariEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return redirect()->route('lupa.password')->with('pesanDanger', "Email anda tidak di termukan!");
        } else {
            return view('auth/set-password', ['user' => $user]);
        }
    }

    public function setPassword(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('id_user', $request->id_user)->first();
        $user->password = bcrypt($validateData['password']);
        $user->update();

        return redirect()->route('auth.login')->with('pesanSuccess', "Password {$user->nama} berhasil di ubah.");
    }
}
