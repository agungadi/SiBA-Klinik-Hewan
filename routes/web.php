<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

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

// Route::get('/', function () {return view('welcome');})->name('welcome');;

// Route::get('/', 'JadwalController@index')->name('welcome');

// Route::get('/beta', 'HomeController@kadaluwarsa');



Route::get('/', [App\Http\Controllers\JadwalController::class, 'index'])->name('welcome');
Route::get('/carijadwal', [App\Http\Controllers\JadwalController::class, 'carijadwal'])->name('carihome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home/daftar/{id}', [App\Http\Controllers\HomeController::class, 'bookantrean'])->name('registrasiantrean');
Route::post('/home/daftar/konfirmasi', [App\Http\Controllers\HomeController::class, 'konfirmasidaftar'])->name('konfirmasidaftar');
Route::get('/home/riwayat', [App\Http\Controllers\HomeController::class, 'daftarbooking'])->name('daftarantrean');
Route::delete('/home/riwayat/batalkan/{id_antrean}/{id_jadwal}', [App\Http\Controllers\HomeController::class, 'batalkan'])->name('batalkan');

Route::get('/home/rules',  [App\Http\Controllers\HomeController::class, 'rules'])->name('rule');

Route::get('/riwayat/view/{id_antrean}', [App\Http\Controllers\HomeController::class, 'viewpdf'])->name('viewpdf');
Route::get('/home/riwayat/cetakpdf/{id_antrean}',  [App\Http\Controllers\HomeController::class, 'cetakpdf'])->name('cetak');



Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.welcome');
    })->name('welcome');


    Auth::routes(['verify' => true]);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('jadwal', HomeController::class);

    Route::get('/daftarantrean', 'AntreanController@index')->name('listantrean');
    Route::get('/daftarantrean/disetujui/{id_antrean}', 'AntreanController@disetujui')->name('disetujui');
    Route::get('/daftarantrean/selesai/{id_antrean}', 'AntreanController@selesai')->name('selesai');
    Route::get('/daftarantrean/cari', 'AntreanController@cari');

    Route::resource('antrean', AntreanController::class);

    Route::resource('user', UserController::class);
    Route::get('/users', 'UserController@index')->name('user');
    Route::get('/users/search', 'UserController@search');

});
