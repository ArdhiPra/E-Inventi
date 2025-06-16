<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    h2 {
      text-align: center;
    }

    h6 {
      text-align: center;
    }

    body {
      background-image: url('{{ asset('images/pnb.jpg') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .background-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(5px);
      z-index: 0;
    }

    .container-box {
      padding: 2rem;
      width: 100%;
      max-width: 500px;
      z-index: 1;
      position: relative;
    }

    .btn-link {
      text-decoration: none;
    }

    .wave-container {
      position: relative;
      width: 100%;
      height: 120px;
      overflow: hidden;
      background: #f8f9fa;
      /* background di atas gelombang */
    }

    /* Elemen gelombang menggunakan background SVG repeat */
    .wave {
      position: absolute;
      bottom: 0;
      width: 6400px;
      height: 200px;
      background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 200" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 C 300 150 900 50 1200 100 L1200 200 L0 200 Z" fill="%23dee2e6"/></svg>') repeat-x;
      opacity: 0.6;
      animation: waveMove 6s linear infinite;
    }

    /* tumpang tiga lapisan gelombang */
    .wave2 {
      bottom: 10px;
      opacity: 0.4;
      animation-duration: 8s;
    }

    .wave3 {
      bottom: 20px;
      opacity: 0.2;
      animation-duration: 10s;
    }

    @keyframes waveMove {
      from {
        transform: translateX(0);
      }

      to {
        transform: translateX(-1600px);
      }
    }
  </style>


</head>

<body>
  <div class="background-overlay"></div>
  <div class="container-box">
    @yield('content')
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>

</html>