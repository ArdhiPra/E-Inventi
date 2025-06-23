<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\DataBarangController;
use App\Http\Controllers\User\ProfileController;


Route::get('/', function () {
    return view('beranda');
})->name('beranda');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('data_barang', DataBarangController::class);
});

// USER
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Peminjaman Routes
    Route::get('/user/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/user/peminjaman/create', [PeminjamanController::class, 'create'])->name('user.peminjaman.create');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('user.profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('user.profile.update');
});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    
    // Route tampilkan form ubah password
    Route::get('/password', [ProfileController::class, 'showChangePasswordForm'])->name('password.edit');

    // Route proses ubah password
    Route::post('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Route set password untuk user Google login (jika belum punya password)
    Route::post('/password/set', [ProfileController::class, 'setPassword'])->name('password.set');
});