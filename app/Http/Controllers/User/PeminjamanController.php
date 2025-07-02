<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('user.peminjaman.index');
    }

    public function create(Request $request)
    {
        $jenis = $request->input('jenis');
        $barangs = [];

        if ($jenis) {
            $barangs = Barang::where('jenis', $jenis)->get();
        }

        return view('user.peminjaman.create', compact('barangs', 'jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'nomor_wa' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenis' => 'required|in:Elektronik,Dekorasi,Perkakas',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // Validasi stok kosong
        if ($barang->stok == 0) {
            return back()->with('error', 'Stok barang ini sudah habis.');
        }

        // Validasi stok tidak cukup
        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok hanya tersedia ' . $barang->stok . ' item.');
        }

        // Simpan data peminjaman
        $peminjaman = new Peminjaman();
        $peminjaman->user_id = Auth::id();
        $peminjaman->barang_id = $request->barang_id;
        $peminjaman->nama_lengkap = $request->nama_lengkap;
        $peminjaman->nim = $request->nim;
        $peminjaman->nomor_wa = $request->nomor_wa;
        $peminjaman->deskripsi = $request->deskripsi;
        $peminjaman->jenis = $request->jenis;
        $peminjaman->jumlah = $request->jumlah;
        $peminjaman->tanggal = $request->tanggal;
        $peminjaman->jam_mulai = $request->jam_mulai;
        $peminjaman->jam_berakhir = $request->jam_berakhir;
        $peminjaman->status = 'pending';
        $peminjaman->save();

        return redirect()->route('user.peminjaman.create')->with('success', 'Pengajuan peminjaman berhasil dikirim.');
    }
}
