@extends('layouts_admin.app')

@section('title', 'Tambah Data Barang')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Data Barang</h3>

    <form action="{{ route('admin.data_barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" id="jenis" class="form-control" required>
                <option value="" disabled selected>Pilih Jenis</option>
                <option value="Dekorasi">Dekorasi</option>
                <option value="Alat Elektronik">Alat Elektronik</option>
                <option value="Perkakas">Perkakas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.data_barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
