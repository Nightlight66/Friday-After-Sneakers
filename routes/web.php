<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SepatuController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'home'])->name('user.home');
Route::get('/detail/{sepatu_id}',[HomeController::class, 'detail'])->name('user.detail');

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'auth'])->name('login');
Route::get('/register',[LoginController::class, 'showRegister']);
Route::post('/register',[LoginController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'AuthUser'])->group(function (){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    //Create
    Route::get('/dashboard/create-sepatu', [AdminController::class, 'createSepatu'])->name('create-sepatu');
    Route::post('/store-sepatu', [SepatuController::class, 'storeSepatu'])->name('store-sepatu');
    
    //Update
    Route::get('/dashboard/edit-sepatu/{sepatu_id}', [AdminController::class, 'editSepatu'])->name('edit-sepatu');
    Route::put('/update-sepatu/{sepatu_id}', [SepatuController::class, 'updateSepatu'])->name('update-sepatu');
    
    //Delete
    Route::delete('/dashboard/delete-sepatu/{sepatu_id}',[SepatuController::class, 'deleteSepatu'])->name('delete-sepatu');
});
