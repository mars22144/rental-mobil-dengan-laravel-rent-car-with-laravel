<?php

use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Livewire\LaporanComponent;
use App\Livewire\TransaksiComponent;


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses');
Route::get('login/keluar', [LoginController::class, 'keluar'])->name('login.keluar');

//coba




Route::get('users', function(){
    return view('users.index');
})->name('users')->middleware('auth');

Route::get('mobil', function(){
    return view('mobil.index');
})->name('mobil')->middleware('auth');

Route::get('transaksi', function(){
    return view('transaksi.index');
})->name('transaksi')->middleware('auth');

Route::get('transaksiProses', function(){
    return view('prosesTransaksi.proses');
})->name('transaksiProses')->middleware('auth');

Route::get('transaksiSelesai', function(){
    return view('prosesTransaksi.index');
})->name('transaksiSelesai')->middleware('auth');

Route::get('laporan', function(){
    return view('laporan.index');
})->name('laporan')->middleware('auth');

Route::get('sewa', function(){
    return view('sewa.index');
})->name('sewa')->middleware('auth');
