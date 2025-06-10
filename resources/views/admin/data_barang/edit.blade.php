@extends('layouts_admin.app')

@section('title', 'Edit Data Barang')

@section('content')
<div class="container mt-4">
    <h4>Edit Barang</h4>
    <form action="{{ route('admin.data_barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <input type="text" name="jenis" class="form-control" value="{{ $barang->jenis }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.data_barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
