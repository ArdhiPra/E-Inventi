@extends('layouts_admin.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        <div class="col-md-4">
        <div class="card text-center">
            <a href="{{ route('admin.data_barang.index') }}" class="text-decoration-none text-dark">
  <div class="card border shadow-sm" style="width: 220px; height: 140px;">
    <div class="card-body d-flex flex-column justify-content-between p-3">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h3 class="fw-bold mb-1">8</h3>
          <p class="mb-0">Data barang</p>
        </div>
        <i class="bi bi-card-checklist" style="font-size: 2.5rem;"></i>
      </div>
      <div class="text-center border-top pt-2">
        <small class="text-muted">Selengkapnya <i class="bi bi-arrow-right-circle"></i></small>
      </div>
    </div>
  </div>
</a>
        </div>
        </div>
        <!-- Tambah lainnya -->
    </div>
@endsection
