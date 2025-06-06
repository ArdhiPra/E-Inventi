<div class="sidebar">
    <h4>e-InvenTI</h4>
    <hr>
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door"></i> Beranda
    </a>
    <a href="{{ route('data-barang.index') }}" class="{{ request()->routeIs('data-barang.*') ? 'active' : '' }}">
        <i class="bi bi-archive"></i> Data Barang
    </a>
    <a href="#"><i class="bi bi-file-earmark-text"></i> Laporan</a>
    <a href="#"><i class="bi bi-clock-history"></i> Riwayat</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-link">
        <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>
</div>
