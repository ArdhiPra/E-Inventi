@extends('layouts.main') {{-- atau layout sesuai punyamu --}}

@section('title', 'Riwayat Peminjaman')

@section('content')

<div class="container mt-4">
    <h5 class="fw-bold">Riwayat Peminjaman</h5>
    <p class="text-muted">Aset HMJ TI</p>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle table-riwayat">
            <thead class="table-light">
                <tr>
                    <th>Tanggal Pengajuan</th>
                    <th>Jenis</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayats as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->jam_mulai }}</td>
                        <td>{{ $item->jam_berakhir }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            @if ($item->status == 'pending')
                                <span class="text-warning fw-bold">Pending</span>
                            @elseif ($item->status == 'disetujui')
                                <span class="text-success fw-bold">Disetujui</span>
                            @elseif ($item->status == 'ditolak')
                                <span class="text-danger fw-bold">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 'disetujui')
                                Dipinjam
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Belum ada data peminjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
