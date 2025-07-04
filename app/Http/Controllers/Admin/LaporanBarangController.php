<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class LaporanBarangController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $query = Peminjaman::where('status', 'disetujui');

        if ($bulan) {
            $query->whereMonth('tanggal', $bulan);
        }

        if ($tahun) {
            $query->whereYear('tanggal', $tahun);
        }

        $peminjamans = $query->with('barang')->get();

        return view('admin.laporan.index', compact('peminjamans', 'bulan', 'tahun'));
    }
}
