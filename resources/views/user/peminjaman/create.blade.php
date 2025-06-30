@extends('layouts.dashboard') {{-- Atau layout profilmu --}}

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Form Pengajuan Peminjaman</h4>

    <form action="" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap', Auth::user()->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" required>
        </div>

        <div class="mb-3">
            <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
            <input type="text" class="form-control" name="whatsapp" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Peminjaman</label>
            <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Barang</label>
            <select name="jenis" class="form-select" required onchange="this.form.submit()">
                <option value="">-- Pilih Jenis --</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Pakaian">Pakaian</option>
                <option value="Makanan">Makanan</option>
                <option value="Game">Game</option>
            </select>
        </div>

        @isset($barangList)
        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Barang</label>
            <select name="barang_id" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangList as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        @endisset

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" name="jam_mulai" required>
        </div>

        <div class="mb-3">
            <label for="jam_berakhir" class="form-label">Jam Berakhir</label>
            <input type="time" class="form-control" name="jam_berakhir" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
        <a href="{{ route('user.peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
