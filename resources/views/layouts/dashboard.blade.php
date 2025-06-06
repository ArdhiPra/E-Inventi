<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    {{-- Custom style (optional tambahan CSS) --}}
    <style>
        body {
        background-color: #f8f9fa;
        }

        .navbar-brand span {
        color: #0d6efd;
        }

        .rounded-img {
        height: 80px;
        border-radius: 10px;
    }


      .hero-section {
    background-image: url('/images/pnb.jpg');
    background-size: cover;
    background-position: center;
    border-radius: 20px;
    padding: 60px 20px;
    position: relative;
  }

  .overlay-text {
    background: rgba(0, 0, 0, 0.4); /* semi-transparan */
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
    font-size: 1.5rem;           /* Atur ukuran icon */
    color: #000000;            /* Ganti warna sesuai kebutuhan (ini biru Bootstrap) */
    cursor: pointer;
    }

  /* Hilangkan caret (segitiga dropdown) */
    .dropdown-toggle::after {
    display: none;
    }
    .navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
}

.logo {
  font-weight: bold;
  font-size: 20px;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 30px;
}

    nav-links li a { 
    text-decoration: none;
    color: #333;
    font-weight: 500;
    }

      .nav-links li a.active {
      font-weight: bold;
        text-decoration: underline;
    }

    .custom-user-icon {
  color: #000;
  transition: transform 0.3s ease, color 0.3s ease;
  cursor: pointer;
  display: inline-block; /* Penting agar transform bisa bekerja */
}

a#userDropdown:hover .custom-user-icon {
  transform: scale(1.5); /* 2.5 terlalu besar, bisa memecah layout */
  color: #333;
}

    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Main content --}}
    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
