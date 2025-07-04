<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Akun - e-InvenTI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold me-3" href="{{ route('user.dashboard') }}">
                        e-<span class="text-primary">InvenTI</span>
                    </a>
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <span class="fw-semibold">Profile Akun</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <div class="profile-container mx-auto">

                <!-- Sidebar -->
                <div class="profile-sidebar">
    <div class="text-center mb-3">
        <div class="bg-primary text-white rounded-circle mx-auto profile-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <h5 class="mt-2">Halo, <strong>{{ auth()->user()->name }}</strong></h5>
    </div>

    <div class="list-group">
        <a href="{{ route('user.dashboard') }}"
           class="list-group-item list-group-item-action {{ isset($active) && $active === 'dashboard' ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a href="{{ route('user.profile') }}"
           class="list-group-item list-group-item-action {{ isset($active) && $active === 'profile' ? 'active' : '' }}">
            <i class="bi bi-person-fill me-2"></i> Informasi Akun
        </a>
        <a href="{{ route('user.password.edit') }}"
           class="list-group-item list-group-item-action {{ isset($active) && $active === 'password' ? 'active' : '' }}">
            <i class="bi bi-key me-2"></i> Ubah Password
        </a>
    </div>

    <!-- Tombol Keluar -->
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="list-group-item list-group-item-action text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Keluar
        </button>
    </form>
</div>

                <!-- Konten Profil -->
                <div class="profile-form">
                    @yield('profile')
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
