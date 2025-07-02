@extends('layouts_admin.main')

@section('title', 'Pengajuan Peminjaman')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Daftar Pengajuan Peminjaman</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nama User</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuans as $p)
            <tr>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->jumlah }}</td>
                <td>{{ $p->jenis }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                <td>{{ $p->jam_mulai }} - {{ $p->jam_berakhir }}</td>
                <td>
                    @if ($p->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @elseif ($p->status == 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-secondary">Pending</span>
                    @endif
                </td>
                <td>
                    @if ($p->status == 'pending')
                        <form method="POST" action="{{ route('admin.pengajuan.setujui', $p->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('admin.pengajuan.tolak', $p->id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
