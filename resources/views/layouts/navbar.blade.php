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
          <li class="nav-item">
            <a class="nav-link {{ Route::is('user.peminjaman.*') ? 'active fw-bold border-bottom border-dark' : '' }}" href="{{ route('user.peminjaman.index') }}">Peminjaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('user.dashboard') ? 'active fw-bold border-bottom border-dark' : '' }}" href="{{ route('user.dashboard') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('user.riwayat.index') ? 'active fw-bold border-bottom border-dark' : '' }}" href="{{ route('user.riwayat.index') }}">Riwayat</a></li>
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
              <a class="dropdown-item user-label" href="{{ route('user.profile') }}">
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

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</nav>
