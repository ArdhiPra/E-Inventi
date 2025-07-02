<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil riwayat peminjaman berdasarkan user login
        $riwayats = Peminjaman::with('barang')
            ->where('user_id', Auth::id())
            ->latest('created_at')
            ->get();

        return view('user.riwayat.index', compact('riwayats'));
    }
}
