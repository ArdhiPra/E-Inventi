<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/1.png') }}">
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Main content --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Bootstrap Bundle JS (termasuk Popper.js) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
</body>
</html>

