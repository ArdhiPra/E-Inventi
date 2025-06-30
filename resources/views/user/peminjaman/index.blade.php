<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalender Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- FullCalendar CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">

    {{-- Custom --}}
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="icon" href="{{ asset('images/1.png') }}">
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    <div class="container py-4">
        <!-- Header dan tombol -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Kalender Peminjaman</h5>
            <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary rounded-pill">
                Ajukan Peminjaman <i class="bi bi-plus-circle ms-1"></i>
            </a>
        </div>

        <!-- Kalender -->
        <div class="bg-light rounded shadow-sm p-3">
            <div id="calendar"></div>
        </div>
    </div>

    <style>
        /* Styling untuk halaman peminjaman */
        .fc .fc-toolbar-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
    </style>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                height: 600,
                events: [
                    // Contoh dummy data
                    {
                        title: 'Peminjaman Laptop',
                        start: '2025-06-22'
                    },
                    {
                        title: 'Peminjaman Proyektor',
                        start: '2025-06-24'
                    }
                ]
            });

            calendar.render();
        });
    </script>

</body>
</html>
