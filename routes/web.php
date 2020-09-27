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
Route::get('/auth/login', 'auth\AuthController@index')->name('auth.login');
Route::get('/auth/register', 'auth\AuthController@register')->name('auth.register');
Route::post('/auth/proses-login', 'auth\AuthController@prosesLogin')->name('login');
Route::post('/auth/proses-register', 'auth\AuthController@prosesRegister')->name('register');
Route::get('/auth/logout', 'auth\AuthController@logout')->name('logout');

Route::group(['middleware' => 'CekLoginMiddleware'], function() {
    // Admin
    Route::get('/admin', 'admin\DashboardController@index')->name('admin.index');
    Route::get('/admin/profile', 'admin\ProfileController@index')->name('admin.profile');
    Route::get('/admin/menu', 'admin\MenuController@index')->name('admin.menu');
    Route::post('/admin/menu', 'admin\MenuController@store')->name('menu.store');
    Route::get('/admin/transaksi', 'admin\TransaksiController@index')->name('admin.transaksi');

    Route::get('/admin/menu/detail/{menu}', 'admin\MenuController@show')->name('menu.show');
    Route::get('/admin/menu/edit/{menu}', 'admin\MenuController@edit')->name('menu.edit');
    Route::patch('/admin/menu/edit/{menu}', 'admin\MenuController@update')->name('menu.update');
    Route::get('/admin/menu/delete/{menu}', 'admin\MenuController@destroy')->name('menu.destroy');
    
    //Waiter
    Route::get('/home', 'waiter\BerandaController@index')->name('waiter.index');
    Route::get('/order', 'waiter\OrderController@index')->name('waiter.order');
    Route::get('/keranjang', 'waiter\KeranjangController@index')->name('waiter.keranjang');
    Route::post('/keranjang', 'waiter\KeranjangController@konfirmasi')->name('waiter.konfirmasi');
    Route::get('/cari', 'waiter\OrderController@cari')->name('waiter.cari');
    
    Route::get('/keranjang', 'waiter\KeranjangController@index')->name('waiter.keranjang');
    Route::get('order/{id_menu}', 'waiter\OrderController@order');
    Route::post('order/{id_menu}', 'waiter\OrderController@prosesorder')->name('proses.order');

    //Kasir
    Route::get('/kasir/profile', 'kasir\ProfileController@index')->name('kasir.profile');
    Route::get('/kasir/order', 'kasir\OrderController@index')->name('kasir.order');
    Route::get('/kasir/transaksi', 'kasir\TransaksiController@index')->name('kasir.transaksi');
});

