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

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

   <script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    height: 600,
    slotMinTime: "06:00:00",
    slotMaxTime: "22:00:00",
    displayEventTime: false, // <== HILANGKAN jam dari title
    eventTimeFormat: {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false
    },
    events: '/calendar-events',
    eventDisplay: 'block',
    eventDidMount: function(info) {
    const start = info.event.start;
    const end = info.event.end;

    const pad = num => String(num).padStart(2, '0');

    const formatTime = (date) => {
        if (!date) return '??:??'; // Jika null, tampilkan placeholder
        return `${pad(date.getHours())}:${pad(date.getMinutes())}`;
    };

    const tooltipContent = `
        ${formatTime(start)} - ${formatTime(end)}
    `;

    tippy(info.el, {
        content: tooltipContent,
        allowHTML: true,
        placement: 'top',
        arrow: true,
    });
}

});

    calendar.render();

});
</script>

</body>
</html>
