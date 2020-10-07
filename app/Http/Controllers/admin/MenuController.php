<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Menu;
use App\User;

class MenuController extends Controller
{
    public function index()
    {
        $user = User::where('id_user', Session::get('id_user'))->first();
        $allMenu = Menu::all();
        return view('admin/menu', compact('user', 'allMenu'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|min:3|max:60',
            'kategori_menu' => 'required',
            'stok' => 'required',
            'gambar' => 'required',
        ]);

        $menu = new Menu();
        $menu->nama_menu = $validateData['nama_menu'];
        $menu->harga = $validateData['harga'];
        $menu->kategori_menu = $validateData['kategori_menu'];
        $menu->stok = $validateData['stok'];
        if ($files = $request->file('gambar')) {
            $destinationPath = 'assets/img/menu/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $menu->gambar = "$profileImage";
        }
        $menu->save();

        return redirect()->route('admin.menu')->with('pesanSuccess', "Data  {$validateData['nama_menu']} berhasil di Tambahkan!");
    }

    public function show($menu)
    {
        $user = User::where('id_user', Session::get('id_user'))->first();
        $menu = Menu::find($menu);
        return view('admin/detail-menu', compact('user','menu'));
    }

    public function edit($menu)
    {
        $user = User::where('id_user', Session::get('id_user'))->first();
        $m = Menu::find($menu);
        return view('admin/edit-menu', compact('user','m'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|min:3|max:60',
            'kategori_menu' => 'required',
            'stok' => 'required',
        ]);
        $update = Menu::where('id_menu', $menu->id_menu)->first();
        if ($files = $request->file('gambar')) {
            $destinationPath = 'assets/img/menu'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $image_path = public_path() . '/assets/img/menu/' . $update->gambar;
            unlink($image_path);
            $update->gambar = "$profileImage";
        }
        $update->nama_menu = $request->get('nama_menu');
        $update->harga = $request->get('harga');
        $update->kategori_menu = $request->get('kategori_menu');
        $update->stok = $request->get('stok');
        $update->update();

        return redirect()->route('admin.menu')->with('pesanSuccess', "Data  {$request['nama_menu']} berhasil di Ubah!");
    }

    public function destroy($menu)
    {
        $m = Menu::find($menu);
        $image_path = public_path() . '/assets/img/menu/' . $m->gambar;
        unlink($image_path);
        $menu = $m->delete();
        return redirect()->route('admin.menu')->with('pesanDanger', "Data {$m['nama_menu']} berhasil di Hapus!");
    }
}
