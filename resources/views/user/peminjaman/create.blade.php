@extends('layouts.main')

@section('title', 'Form Peminjaman')

@section('content')
<div class="container mt-4">
    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h3>Form Peminjaman Barang</h3>

    {{-- Form Pilih Jenis --}}
    <form method="GET" action="{{ route('user.peminjaman.create') }}" class="mb-3">
        <div class="form-group">
            <label for="jenis">1. Pilih Jenis Barang</label>
            <select name="jenis" id="jenis" class="form-control" onchange="this.form.submit()" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Elektronik" {{ request('jenis') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                <option value="Dekorasi" {{ request('jenis') == 'Dekorasi' ? 'selected' : '' }}>Dekorasi</option>
                <option value="Perkakas" {{ request('jenis') == 'Perkakas' ? 'selected' : '' }}>Perkakas</option>
            </select>
        </div>
    </form>

    {{-- Form Peminjaman --}}
    <form method="POST" action="{{ route('user.peminjaman.store') }}">
        @csrf
        <input type="hidden" name="jenis" value="{{ request('jenis') }}">

        <div class="mb-3">
            <label for="nama_lengkap">2. Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required value="{{ old('nama_lengkap') }}">
        </div>

        <div class="mb-3">
            <label for="nim">3. NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" required value="{{ old('nim') }}">
        </div>

        <div class="mb-3">
            <label for="nomor_wa">4. Nomor WhatsApp</label>
            <input type="text" name="nomor_wa" id="nomor_wa" class="form-control" required value="{{ old('nomor_wa') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi">5. Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="barang_id">6. Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah">7. Jumlah Dipinjam</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required value="{{ old('jumlah') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal">8. Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required value="{{ old('tanggal') }}">
        </div>

        <div class="mb-3">
            <label for="jam_mulai">9. Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required value="{{ old('jam_mulai') }}">
        </div>

        <div class="mb-3">
            <label for="jam_berakhir">10. Jam Berakhir</label>
            <input type="time" name="jam_berakhir" id="jam_berakhir" class="form-control" required value="{{ old('jam_berakhir') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ajukan Peminjaman</button>
        <a href="{{ route('user.peminjaman.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
@endsection
