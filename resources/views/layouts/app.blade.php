<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  
  <style>
    h2{
      text-align: center;
    }

    h6{
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
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(5px);
      z-index: 0;
    }

    .container-box {
      padding: 2rem;
      border-radius: 1rem;
      width: 100%;
      max-width: 500px;
      z-index: 1;
      position: relative;
    }

    .btn-link{
      text-decoration:none ;
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
  @stack('scripts')
</body>
</html>
