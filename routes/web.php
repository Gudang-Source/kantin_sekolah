<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('/index', 'BerandaController@index')->name('index');
Route::get('/auth/login', 'auth\AuthController@index')->name('auth.login');
Route::get('/auth/register', 'auth\AuthController@register')->name('auth.register');
Route::post('/auth/proses-login', 'auth\AuthController@prosesLogin')->name('login');
Route::post('/auth/proses-register', 'auth\AuthController@prosesRegister')->name('register');

Route::get('/auth/lupa-password', 'auth\AuthController@lupaPassword')->name('lupa.password');
Route::post('/auth/lupa-pasword', 'auth\AuthController@cariEmail')->name('cari.email');
Route::post('/auth/set-password', 'auth\AuthController@setPassword')->name('proses.set.password');

Route::get('/auth/logout', 'auth\AuthController@logout')->name('logout');

Route::group(['middleware' => 'CekLoginMiddleware'], function() {
    // Admin
    Route::get('/admin', 'admin\DashboardController@index')->name('admin.index');
    Route::get('/admin/profile', 'admin\ProfileController@index')->name('admin.profile');
    Route::post('/admin/profile/edit', 'admin\ProfileController@edit')->name('admin.ubah.profile');
    Route::get('/admin/User', 'admin\UserController@index')->name('admin.user');
    Route::get('/admin/user/waiting', 'admin\UserController@waiting')->name('admin.user.waiting');
    Route::get('/admin/menu', 'admin\MenuController@index')->name('admin.menu');
    Route::post('/admin/menu', 'admin\MenuController@store')->name('menu.store');
    Route::get('/admin/transaksi', 'admin\TransaksiController@index')->name('admin.transaksi');

    Route::get('/admin/menu/detail/{menu}', 'admin\MenuController@show')->name('menu.show');
    Route::get('/admin/menu/edit/{menu}', 'admin\MenuController@edit')->name('menu.edit');
    Route::patch('/admin/menu/edit/{menu}', 'admin\MenuController@update')->name('menu.update');
    Route::get('/admin/menu/delete/{menu}', 'admin\MenuController@destroy')->name('menu.destroy');
    
    //Waiter
    Route::get('/waiter/home', 'waiter\BerandaController@index')->name('waiter.index');
    Route::get('/waiter/order', 'waiter\OrderController@index')->name('waiter.order');
    Route::get('/waiter/keranjang', 'waiter\KeranjangController@index')->name('waiter.keranjang');
    Route::post('/waiter/keranjang', 'waiter\KeranjangController@konfirmasi')->name('waiter.konfirmasi');
    Route::post('/waiter/keranjang/edit', 'waiter\KeranjangController@editOrder')->name('edit.order');
    Route::post('/waiter/keranjang/delete', 'waiter\KeranjangController@hapusOrder')->name('destroy.order');
    Route::get('/waiter/cari', 'waiter\OrderController@cari')->name('waiter.cari');
    Route::get('/waiter/profile', 'waiter\ProfileController@index')->name('waiter.profile');
    Route::post('/waiter/profile/edit', 'waiter\ProfileController@edit')->name('waiter.ubah.profile');
    
    Route::get('/waiter/keranjang', 'waiter\KeranjangController@index')->name('waiter.keranjang');
    Route::get('/waiter/order/{id_menu}', 'waiter\OrderController@order');
    Route::post('/waiter/order', 'waiter\OrderController@prosesorder')->name('proses.order');

    //Kasir
    Route::get('/kasir/profile', 'kasir\ProfileController@index')->name('kasir.profile');
    Route::post('/kasir/profile/edit', 'kasir\ProfileController@edit')->name('kasir.ubah.profile');
    Route::get('/kasir/order', 'kasir\OrderController@index')->name('kasir.order');
    Route::post('/kasir/order', 'kasir\OrderController@bayar')->name('kasir.bayar');
    Route::get('/kasir/transaksi', 'kasir\TransaksiController@index')->name('kasir.transaksi');
    Route::get('/kasir/print/{id_transaksi}', 'kasir\TransaksiController@print')->name('kasir.print');
    Route::get('/kasir/print', 'kasir\TransaksiController@printAll')->name('kasir.printAll');
    Route::get('/kasir/transaksi/{id_transaksi}', 'kasir\TransaksiController@show')->name('preview.transaksi');
});

