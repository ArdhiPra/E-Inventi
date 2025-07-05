<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="icon" href="{{ asset('images/1.png') }}">
</head>
<body>

<!-- Checkbox untuk toggle sidebar -->
<input type="checkbox" id="sidebarToggle" hidden>

<!-- Top Bar -->
<div class="top-bar">
  <div class="d-flex align-items-center">
    <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
    <span class="fw-semibold">Admin</span>
  </div>
  <!-- Label sebagai tombol toggle -->
  <label for="sidebarToggle" class="mb-0">
    <i class="bi bi-list toggle-icon"></i>
  </label>
</div>

<!-- Wrapper -->
<div class="wrapper">
  <!-- Sidebar -->
  <div id="sidebar" class="sidebar text-center">
    <h4>e-InvenTI</h4>
    <small>Inventaris HMJTI</small>
    <hr>
    <div class="admin-info d-flex align-items-center justify-content-center mb-3">
      <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
      <span class="fw-semibold">Admin</span>
    </div>
    <hr>
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-house-door"></i>
  <span>BERANDA</span>
</a>
<a href="{{ route('admin.data_barang.index') }}" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-box"></i>
  <span>Data Barang</span>
</a>
<a href="{{ route('admin.pengajuan.index') }}" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-clock-history"></i>
  <span>Pengajuan</span>
</a>
<a href="{{ route('admin.laporan') }}" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-file-earmark-text"></i>
  <span>Laporan</span>
</a>
<a href="{{ route('admin.profile.index') }}" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-person"></i>
  <span>Profile</span>
</a>
<hr>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex align-items-center gap-2 mb-2">
  @csrf
  <button type="submit" class="btn btn-link p-0 text-start d-flex align-items-center gap-2 text-decoration-none text-dark w-100">
    <i class="bi bi-box-arrow-right"></i>
    <span>Logout</span>
  </button>
</form>
  </div>

  <!-- Main Content -->
  <div class="content">
    @yield('content')
  </div>
</div>

<!-- Bootstrap JS (opsional, tidak digunakan untuk toggle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
