<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - e-InvenTI</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <div class="top-bar d-flex justify-content-between align-items-center px-3 py-2 border">
        <div class="d-flex align-items-center">
            <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
            <span class="fw-semibold">Admin</span>
        </div>
        <i class="bi bi-list" style="font-size: 1.5rem; cursor: pointer;"></i>
    </div>


  <style>
    body, html {
      height: 100%;
      margin: 0;
    }

    .wrapper {
      display: flex;
      flex-direction: row-reverse;
      height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: #d7f9fc;
      padding: 1.5rem;
      box-shadow: -2px 0 5px rgba(0,0,0,0.1);
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
  </style>
</head>
<body>

<div class="wrapper">
  <!-- Sidebar kanan -->
  <div class="sidebar text-center">
    <h4>e-InvenTI</h4>
    <small>Inventaris HMJTI</small>
    <hr>
    <div class="admin-info d-flex align-items-center justify-content-center mb-3">
        <i class="bi bi-person-circle me-2" style="font-size: 1.5rem;"></i>
            <span class="fw-semibold">Admin</span>
    </div>
    <hr>
    <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i> BERANDA</a>
    <a href="{{ route('data-barang.index') }}"><i class="bi bi-box"></i> Data Barang</a>
    <a href="#"><i class="bi bi-clock-history"></i> Riwayat Peminjaman</a>
    <a href="#"><i class="bi bi-file-earmark-text"></i> Laporan</a>
    <a href="#"><i class="bi bi-person"></i> Profile</a>
    <hr>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="bi bi-box-arrow-right"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <!-- Main Content -->
  <div class="content">
    @yield('content')
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>
