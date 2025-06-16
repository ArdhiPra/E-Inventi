<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;


class AdminController extends Controller
{
    public function dashboard()
{
    $jumlahBarang = Barang::count();
    return view('admin.dashboard', compact('jumlahBarang'));
}
}
