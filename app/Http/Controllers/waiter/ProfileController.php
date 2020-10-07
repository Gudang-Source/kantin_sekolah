<?php

namespace App\Http\Controllers\waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id_user', session::get('id_user'))->first();
        return view('waiter/profile', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('id_user', Session::get('id_user'))->first();
        $user->nama = $validateData['nama'];
        $user->email = $validateData['email'];
        if (empty($request->image)) {
            $user->gambar = $user->gambar;
        } else {
            if ($files = $request->file('image')) {
                $destinationPath = 'assets/img/user/'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $image_path = public_path() . '/assets/img/user/' . $user->gambar;
                unlink($image_path);
                $user->gambar = "$profileImage";
            }
        }
        $user->update();

        return redirect()->route('waiter.profile')->with('pesanSuccess', "Profile anda berhasil di ubah!");
    }
}
