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

Route::get('/home', 'KantinController@index')->name('kantin.index');
Route::get('/auth', 'KantinController@auth')->name('kantin.auth');

// Admin
Route::get('/admin/index', 'AdminController@index')->name('admin.index');
Route::get('/admin/menu', 'AdminController@menu')->name('admin.menu');
Route::get('/admin/detail_menu', 'AdminController@detail_menu')->name('admin.detail_menu');