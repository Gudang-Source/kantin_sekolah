<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function menu()
    {
        $allMenu = Menu::all();
        return view('admin/menu', ['data_menu' => $allMenu]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|min:3|max:60',
            'kategori' => 'required',
            'stok' => 'required',
        ]);
        
        $menu = new Menu();
        $menu->nama_menu = $validateData['nama_menu'];
        $menu->harga = $validateData['harga'];
        $menu->kategori = $validateData['kategori'];
        $menu->stok = $validateData['stok'];
        $menu->save();

        return redirect()->route('admin.menu')->with('pesanSuccess', "Data  {$validateData['nama_menu']} berhasil di Tambahkan!");
    }

    public function show($id_menu)
    {
        $menu = Menu::find($id_menu);
        return view('admin/detail-menu', ['menu' => $menu]);
    }

    public function edit($id_menu)
    {
        $menu = Menu::find($id_menu);
        return view('admin/edit-menu', ['menu' => $menu]);
    }

    public function update(Request $request, $id_menu)
    {
        $validateData = $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|min:3|max:60',
            'kategori' => 'required',
            'stok' => 'required',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $menu = Menu::find($id_menu);
        $menu::where('id_menu', $menu['id_menu'])->update($validateData);
        return redirect()->route('admin.menu')->with('pesanSuccess', "Data  {$validateData['nama_menu']} berhasil di Ubah!");
    }

    public function destroy($id_menu)
    {
        $m = Menu::find($id_menu);
        $id_menu = $m->delete();
        return redirect()->route('admin.menu')->with('pesanDanger', "Data {$m['nama_menu']} berhasil di Hapus!");
    }
}
