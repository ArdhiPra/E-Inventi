<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Barang;

class PengajuanController extends Controller
{
    /**
     * Tampilkan semua pengajuan peminjaman.
     */
    public function index()
    {
        $pengajuans = Peminjaman::with('user', 'barang')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    /**
     * Setujui pengajuan peminjaman.
     */
    public function setujui($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->barang->stok >= $peminjaman->jumlah) {
            $peminjaman->status = 'disetujui';
            $peminjaman->save();

            // Kurangi stok barang
            $peminjaman->barang->stok -= $peminjaman->jumlah;
            $peminjaman->barang->save();

            return back()->with('success', 'Peminjaman disetujui dan stok dikurangi.');
        } else {
            return back()->with('error', 'Stok tidak mencukupi untuk menyetujui peminjaman ini.');
        }
    }

    /**
     * Tolak pengajuan peminjaman.
     */
    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = 'ditolak';
        $peminjaman->save();

        return back()->with('success', 'Peminjaman ditolak.');
    }
}
