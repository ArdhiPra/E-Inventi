@extends('layouts_admin.main')

@section('content')
<div class="container">
    <h2>Data Barang</h2>
    <a href="{{ route('admin.data_barang.create') }}" class="btn btn-primary">+ Tambah Data</a>
    <a href="#" class="btn btn-secondary">Cetak Data</a>

    <table class="table table-bordered mt-3">
        <thead class="table-info">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Jenis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->jenis }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">History</a>
                    <form action="{{ route('admin.data_barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="{{ route('admin.data_barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
