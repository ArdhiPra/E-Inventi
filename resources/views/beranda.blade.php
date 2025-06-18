<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - E-InvenTI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero-section {
            background-image: url('/images/pnb.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            padding: 40px 20px;
            position: relative;
            margin-bottom: 2rem;
        }

        .overlay-text {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 30px 50px;
            border-radius: 10px;
            display: inline-block;
        }

        .carousel-item .card {
            width: 12rem;
        }

        .carousel-box {
            margin-bottom: 2rem;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .navbar-brand span {
            color: #0d6efd;
            font-weight: bold;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #6c757d;
            border-radius: 50%;
        }

        .calendar-box {
        background-color: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>
<body>

    {{-- Navbar khusus guest --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ route('login') }}">
            e-<span class="text-primary">InvenTI</span>
        </a>

        {{-- Toggle untuk Mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNavbar"
            aria-controls="guestNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Isi Navbar --}}
        <div class="collapse navbar-collapse" id="guestNavbar">
            {{-- Menu Tengah --}}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold border-bottom border-dark" href="{{ route('login') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Riwayat</a>
                </li>
            </ul>

            <div class="d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Daftar</a>
            </div>
        </div>
    </div>
</nav>


    {{-- Konten Utama --}}
    <main class="container py-4">

        {{-- Hero --}}
        <div class="hero-section text-center">
            <div class="overlay-text">
                <h2 class="fw-bold">Selamat datang di Sistem<br>Peminjaman HMJ TI</h2>
            </div>
        </div>

        {{-- Carousel --}}
        <div class="carousel-box">
            <div id="itemCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner px-5">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center gap-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/proyektor.png') }}" class="card-img-top p-3" alt="Proyektor">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Proyektor</h6>
                                </div>
                            </div>
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/gamelan.png') }}" class="card-img-top p-3" alt="Gamelan">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Gamelan</h6>
                                </div>
                            </div>
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/peralatan.png') }}" class="card-img-top p-3" alt="Peralatan">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Peralatan</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="d-flex justify-content-center gap-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/proyektor.png') }}" class="card-img-top p-3" alt="Proyektor 2">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Proyektor 2</h6>
                                </div>
                            </div>
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/gamelan.png') }}" class="card-img-top p-3" alt="Gamelan 2">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Gamelan 2</h6>
                                </div>
                            </div>
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/peralatan.png') }}" class="card-img-top p-3" alt="Peralatan 2">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Peralatan 2</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#itemCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#itemCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Berikutnya</span>
                </button>
            </div>
        </div>

        <div class="calendar-box">
            <h5 class="mb-3">Calender Peminjaman</h5>
            @include('user.components.calendar')
        </div>
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
