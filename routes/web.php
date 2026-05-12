<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SepatuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'home'])->name('user.home');
Route::get('/home/katalog', [HomeController::class, 'katalog'])->name('user.katalog');
Route::get('/detail/{sepatu_id}',[HomeController::class, 'detail'])->name('user.detail');

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'auth'])->name('login');
// Route::get('/register',[LoginController::class, 'showRegister']);
// Route::post('/register',[LoginController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'AuthUser'])->group(function (){
    Route::get('/dashboard', [SepatuController::class, 'dashboard'])->name('dashboard');
    
    //Create Sepatu
    Route::get('/dashboard/create-sepatu', [SepatuController::class, 'createSepatu'])->name('create-sepatu');
    Route::post('/store-sepatu', [SepatuController::class, 'storeSepatu'])->name('store-sepatu');
    
    //Edit &Update Sepatu
    Route::get('/dashboard/edit-sepatu/{sepatu_id}', [SepatuController::class, 'editSepatu'])->name('edit-sepatu');
    Route::put('/update-sepatu/{sepatu_id}', [SepatuController::class, 'updateSepatu'])->name('update-sepatu');
    
    //Delete Sepatu
    Route::delete('/dashboard/delete-sepatu/{sepatu_id}',[SepatuController::class, 'deleteSepatu'])->name('delete-sepatu');

    //View Pesanan
    Route::get('/dashboard/pesanan',[PesananController::class, 'showPesanan'])->name('pesanan.index');

    //Create Pesanan
    Route::get('/dashboard/pesanan/create',[PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/dashboard/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');

    //Edit & Update Pesanan
    Route::get('/dashboard/pesanan/edit/{id}', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::put('/dashboard/pesanan/update/{id}', [PesananController::class, 'update'])->name('pesanan.update');

    //Delete Pesanan
    Route::delete('/dashboard/pesanan/delete/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
    //Laporan Penjualan Bulanan
    Route::get('/dashboard/laporan-penjualan', [LaporanController::class, 'index'])->name('laporan-penjualan.index');
});