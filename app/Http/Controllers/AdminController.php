<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Peminjaman;


class AdminController extends Controller
{
    public function dashboard()
    {
    $jumlahBarang = Barang::count();
    $jumlahPengajuan = Peminjaman::where('status', 'pending')->count();
    $jumlahRiwayat = Peminjaman::where('status', 'disetujui')->count();

    return view('admin.dashboard', compact('jumlahBarang', 'jumlahPengajuan', 'jumlahRiwayat'));    
    }
}
