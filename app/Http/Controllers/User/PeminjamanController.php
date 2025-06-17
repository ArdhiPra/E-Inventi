<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('user.peminjaman');
    }

    public function create()
    {
        return view('user.peminjaman-create'); // buat nanti kalau perlu
    }
}

