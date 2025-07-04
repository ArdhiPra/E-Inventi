@extends('layouts_admin.main')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row gx-2 gy-3">
        {{-- Data Barang --}}
        <div class="col-md-4">
            <a href="{{ route('admin.data_barang.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">7</h3>
                                <p class="mb-0">Data Barang</p>
                            </div>
                            <i class="bi bi-card-checklist fs-2"></i>
                        </div>
                        <div class="text-center border-top pt-2">
                            <small class="text-muted">Selengkapnya <i class="bi bi-arrow-right-circle"></i></small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Pengajuan --}}
        <div class="col-md-4">
            <a href="{{ route('admin.pengajuan.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">0</h3>
                                <p class="mb-0">Pengajuan</p>
                            </div>
                            <i class="bi bi-inbox fs-2"></i>
                        </div>
                        <div class="text-center border-top pt-2">
                            <small class="text-muted">Selengkapnya <i class="bi bi-arrow-right-circle"></i></small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Laporan Barang --}}
        <div class="col-md-4">
            <a href="{{ route('admin.laporan') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-1">{{ $jumlahRiwayat }}</h3>
                                <p class="mb-0">Laporan Barang</p>
                            </div>
                            <i class="bi bi-file-earmark-text fs-2"></i>
                        </div>
                        <div class="text-center border-top pt-2">
                            <small class="text-muted">Selengkapnya <i class="bi bi-arrow-right-circle"></i></small>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
