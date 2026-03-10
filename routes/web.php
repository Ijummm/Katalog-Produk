<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarFotoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister']);
});

Route::middleware('auth')->group(function () {
    Route::get('/produk', function () {
        if (Auth::user()->role == 'admin') {
            return view('produk.index');
        }
        return view('produk.index');
    })->name('produk.index')->middleware('auth');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //foto
    Route::get('/produk', [FotoController::class, 'index'])->name('produk.index');
    Route::get('/produk/{id}', [FotoController::class, 'show'])->name('produk.show');

    Route::get('/produk/create', [FotoController::class, 'create'])->name('produk.create');
    Route::post('/produk', [FotoController::class, 'store'])->name('produk.store');

    Route::get('/produk/{id}/edit', [FotoController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [FotoController::class, 'update'])->name('produk.update');

    Route::delete('/produk/{id}', [FotoController::class, 'destroy'])->name('produk.destroy');
    
    Route::post('/komentar', [KomentarFotoController::class, 'store'])->name('komentar.store');
});