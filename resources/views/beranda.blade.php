<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand span { color: #0d6efd; }
        .hero-section {
            background-image: url('/images/pnb.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            padding: 60px 20px;
            position: relative;
        }
        .overlay-text {
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 15px;
            display: inline-block;
        }
        .calendar-box {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .custom-user-icon {
            font-size: 1.5rem;
            color: #000;
            cursor: pointer;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        a#userDropdown:hover .custom-user-icon {
            transform: scale(1.5);
            color: #333;
        }
        .dropdown-toggle::after {
            display: none;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-bold" href="#">E-<span>InvenTI</span></a>

        <div class="collapse navbar-collapse justify-content-center flex-grow-1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active fw-bold" href="#">Beranda</a></li>
            </ul>
        </div>

        {{-- Navbar kanan: auth --}}
        @auth
        <div class="dropdown ms-3">
            <a href="#" id="userDropdown" data-bs-toggle="dropdown" class="text-decoration-none">
                <i class="bi bi-person-circle custom-user-icon"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item disabled">{{ Auth::user()->name }}</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="POST">@csrf
                        <button type="submit" class="dropdown-item text-danger">Keluar</button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth

        @guest
        <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>
        @endguest

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

{{-- Hero --}}
<div class="hero-section text-white text-center mb-4">
    <div class="overlay-text">
        <h2 class="fw-bold">Selamat datang di Sistem<br>Peminjaman HMJ TI</h2>
    </div>
</div>

{{-- Carousel --}}
<div id="itemCarousel" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner px-5">
        <div class="carousel-item active">
            <div class="d-flex justify-content-center gap-4">
                @foreach (['proyektor.png' => 'Proyektor', 'gamelan.png' => 'Gamelan', 'peralatan.png' => 'Peralatan'] as $img => $label)
                <div class="card shadow-sm" style="width: 12rem;">
                    <img src="{{ asset('images/' . $img) }}" class="card-img-top p-3" alt="{{ $label }}">
                    <div class="card-body text-center"><h6 class="card-title">{{ $label }}</h6></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#itemCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#itemCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle"></span>
    </button>
</div>

{{-- Kalender --}}
<div class="calendar-box">
    <h5 class="mb-3">Kalender Peminjaman</h5>
    @include('user.components.calendar')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
