<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    
    <!-- Logo -->
    <a class="navbar-brand me-auto fw-bold" href="#">E-<span class="text-primary">InvenTI</span></a>

    <!-- Nav Items -->
    <div class="collapse navbar-collapse justify-content-center flex-grow-1" id="navbarContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="#">Peminjaman</a></li>
        <li class="nav-item"><a class="nav-link active fw-bold border-bottom border-dark" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Riwayat</a></li>
      </ul>
    </div>

    <!-- User Icon -->
    <div class="dropdown ms-3">
      <a href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" class="text-decoration-none">
        <i class="bi bi-person-circle fs-4 custom-user-icon"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li>
          <a class="dropdown-item disabled" href="#">
            {{ Auth::user()->name }}
          </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item text-danger">Keluar</button>
          </form>
        </li>
      </ul>
    </div>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
