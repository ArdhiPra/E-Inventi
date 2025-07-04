@extends('layouts_admin.main')

@section('title', 'Laporan Barang')

@section('content')
<div class="container">
    <h3 class="mb-4">Laporan Barang</h3>

    <form method="GET" class="mb-3 d-flex gap-3">
        <div>
            <label>Bulan</label>
            <select name="bulan" class="form-select">
                <option value="">Pilih Bulan</option>
                @foreach(range(1, 12) as $bln)
                    <option value="{{ $bln }}" {{ request('bulan') == $bln ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $bln)->format('F') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tahun</label>
            <input type="number" name="tahun" value="{{ request('tahun') }}" class="form-control" placeholder="Pilih Tahun">
        </div>

        <div class="align-self-end">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Nama</th>
                <th>Waktu</th>
                <th>No.Telp</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjamans as $index => $p)
            <tr>
                <td>{{ $index + 1 }}.</td>
                <td>{{ $p->barang->nama_barang ?? '-' }}</td>
                <td>{{ ucfirst($p->status) }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>{{ $p->nama_lengkap }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $p->nomor_wa }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
