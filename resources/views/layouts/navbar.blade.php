<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm position-relative">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    
    <a class="navbar-brand fw-bold" href="#">E-<span class="text-primary">InvenTI</span></a>

    <div class="position-absolute start-50 translate-middle-x">
      <ul class="navbar-nav d-flex flex-row gap-4">
        <li class="nav-item"><a class="nav-link" href="#">Peminjaman</a></li>
        <li class="nav-item"><a class="nav-link active fw-bold border-bottom border-dark" href="">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Riwayat</a></li>
      </ul>
    </div>

    <div class="dropdown">
      <a href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" class="text-decoration-none">
        <i class="bi bi-person-circle fs-4 custom-user-icon"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="#">Akun Saya</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="dropdown-item text-danger">Keluar</button>
          </form>
        </li>
      </ul>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
