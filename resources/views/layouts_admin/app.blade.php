<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - e-InvenTI</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
    }

    /* Toggle Sidebar */
    #sidebarToggle {
      display: none;
    }

    .wrapper {
      display: flex;
      flex-direction: row-reverse;
      height: 100vh;
      position: relative;
    }

    .sidebar {
      width: 250px;
      background-color: #d7f9fc;
      padding: 1.5rem;
      box-shadow: -2px 0 5px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    /* Hide sidebar when checkbox not checked */
    #sidebarToggle:not(:checked) ~ .wrapper .sidebar {
      transform: translateX(100%);
    }

    .sidebar h4 {
      font-weight: bold;
    }

    .sidebar a {
      display: block;
      padding: 0.5rem 0;
      color: #000;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar a:hover {
      color: #007bff;
    }

    .content {
      flex: 1;
      padding: 2rem;
      overflow-y: auto;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.5rem 1rem;
      border-bottom: 1px solid #ccc;
    }

    .toggle-icon {
      font-size: 1.5rem;
      cursor: pointer;
    }
  </style>
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
<a href="#" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-clock-history"></i>
  <span>Riwayat Peminjaman</span>
</a>
<a href="#" class="d-flex align-items-center gap-2 mb-2">
  <i class="bi bi-file-earmark-text"></i>
  <span>Laporan</span>
</a>
<a href="#" class="d-flex align-items-center gap-2 mb-2">
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
@stack('scripts')

</body>
</html>
