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
    Route::get('/admin/menu', 'admin\MenuController@index')->name('admin.menu');
    Route::post('/admin/menu', 'admin\MenuController@store')->name('menu.store');
    Route::get('/admin/menu/detail/{menu}', 'admin\MenuController@show')->name('menu.show');
    Route::get('/admin/menu/edit/{menu}', 'admin\MenuController@edit')->name('menu.edit');
    Route::patch('/admin/menu/edit/{menu}', 'admin\MenuController@update')->name('menu.update');
    Route::get('/admin/menu/delete/{menu}', 'admin\MenuController@destroy')->name('menu.destroy');
    
    //Kasir
    Route::get('/home', 'kasir\BerandaController@index')->name('kasir.index');
    Route::get('/pesan', 'kasir\OrderController@index')->name('kasir.pesan');
    Route::get('/keranjang', 'kasir\KeranjangController@index')->name('kasir.keranjang');
    Route::get('order/{id_menu}', 'kasir\OrderController@order');
    Route::post('order/{id_menu}', 'kasir\OrderController@prosesOrder')->name('proses.order');
});

