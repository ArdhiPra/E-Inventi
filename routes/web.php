<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\DataBarangController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\LaporanBarangController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RiwayatController;



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
    Route::get('/admin/laporan-barang', [LaporanBarangController::class, 'index'])->name('admin.laporan');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('data_barang', DataBarangController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/pengajuan', [\App\Http\Controllers\Admin\PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::post('/pengajuan/{id}/setujui', [\App\Http\Controllers\Admin\PengajuanController::class, 'setujui'])->name('pengajuan.setujui');
    Route::post('/pengajuan/{id}/tolak', [\App\Http\Controllers\Admin\PengajuanController::class, 'tolak'])->name('pengajuan.tolak');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
});

// USER
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Peminjaman Routes
    Route::get('/user/peminjaman', [PeminjamanController::class, 'index'])->name('user.peminjaman.index');
    Route::get('/user/peminjaman/create', [PeminjamanController::class, 'create'])->name('user.peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('user.peminjaman.store');
    Route::get('/user/peminjaman/riwayat', [PeminjamanController::class, 'riwayat'])->name('user.peminjaman.riwayat');
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

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/user/riwayat', [RiwayatController::class, 'index'])->name('user.riwayat.index');    
});

Route::get('/calendar-events', [CalendarController::class, 'getEvents']);
