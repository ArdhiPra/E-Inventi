
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <div class="row w-100 align-items-center">
            <!-- KIRI: Logo -->
            <div class="col-4 d-flex align-items-center">
                <a class="navbar-brand fw-bold" href="{{ route('user.dashboard') }}">e-<span class="text-primary">InvenTI</span></a>
            </div>

            <!-- TENGAH: Menu -->
            <div class="col-4 d-flex justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('peminjaman') }}">Peminjaman</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('user.dashboard') ? 'active fw-bold border-bottom border-dark' : '' }}" href="{{ route('user.dashboard') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('riwayat') }}">Riwayat</a></li>
                </ul>
            </div>

            <!-- KANAN: User icon + toggler -->
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="dropdown me-2">
                    <a href="#" id="userDropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false" class="text-decoration-none">
                        <i class="bi bi-person-circle fs-4 custom-user-icon"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item user-label" href="{{ route('profile') }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider m-0"></li>
                        <li>
                            <form action="/logout" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">
                                    <i class="bi bi-box-arrow-right"></i> Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="text-center">
                <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; font-size: 30px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <h5 class="mt-2">Hello, <strong>{{ htmlspecialchars(Auth::user()->name) }}</strong></h5>
            </div>
            <ul class="list-group mt-4">
                <li class="list-group-item list-group-item-action active">
                    <i class="bi bi-person me-2"></i> Informasi Akun
                </li>
                <li class="list-group-item list-group-item-action">
                    <i class="bi bi-receipt me-2 text-primary"></i>
                    <a href="{{ route('history-transaksi') }}" class="text-decoration-none text-dark">Riwayat Transaksi</a>
                </li>
                <li class="list-group-item list-group-item-action">
                    <i class="bi bi-key me-2 text-purple"></i>
                    <a href="{{ route('ubah-password') }}" class="text-decoration-none text-dark">Ubah Password</a>
                </li>
                <li class="list-group-item list-group-item-action text-danger" onclick="confirmLogout()">
                    <i class="bi bi-box-arrow-right me-2"></i> Keluar
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
