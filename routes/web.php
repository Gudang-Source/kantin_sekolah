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
    Route::get('/admin/index', function(){return view('kantin/index');});
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/menu', 'AdminController@menu')->name('admin.menu');
    
    //Menu
    Route::post('/admin/menu', 'AdminController@store')->name('menu.store');
    Route::get('/admin/menu/detail/{menu}', 'AdminController@show')->name('menu.show');
    Route::get('/admin/menu/edit/{menu}', 'AdminController@edit')->name('menu.edit');
    Route::patch('/admin/menu/edit/{menu}', 'AdminController@update')->name('menu.update');
    Route::get('/admin/menu/delete/{menu}', 'AdminController@destroy')->name('menu.destroy');
    
    //Kasir
    Route::get('/home', 'KantinController@index')->name('kantin.index');
    Route::get('/keranjang', 'OrderController@keranjang')->name('kantin.keranjang');
    Route::get('order/{id_menu}', 'OrderController@order');
    Route::post('order/{id_menu}', 'OrderController@prosesOrder')->name('proses.order');
});

