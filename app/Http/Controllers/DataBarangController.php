<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    public function index()
    {
        $dataBarang = DataBarang::all();
        return view('admin.data_barang.index', compact('dataBarang'));
    }

    public function create()
    {
        return view('admin.data_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'jenis' => 'required',
        ]);

        DataBarang::create($request->all());
        return redirect()->route('data-barang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(DataBarang $dataBarang)
    {
        return view('admin.data_barang.edit', compact('dataBarang'));
    }

    public function update(Request $request, DataBarang $dataBarang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'jenis' => 'required',
        ]);

        $dataBarang->update($request->all());
        return redirect()->route('data-barang.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(DataBarang $dataBarang)
    {
        $dataBarang->delete();
        return redirect()->route('data-barang.index')->with('success', 'Data berhasil dihapus');
    }
}
