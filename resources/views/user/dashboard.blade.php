@extends('layouts.main')

@section('content')

    {{-- Hero Section --}}
    <div class="hero-section text-white text-center mb-4">
        <div class="overlay-text">
            <h2 class="fw-bold">Selamat datang di Sistem<br>Peminjaman HMJ TI</h2>
        </div>
    </div>

    {{-- Gambar-gambar item --}}
    <div id="itemCarousel" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="3000"
        data-bs-pause="false">
        <div class="carousel-inner px-5">

            {{-- Slide Pertama --}}
            <div class="carousel-item active">
                <div class="d-flex justify-content-center gap-4">
                    <div class="card shadow-sm" style="width: 12rem;">
                        <img src="{{ asset('images/proyektor.png') }}" class="card-img-top p-3" alt="Proyektor">
                        <div class="card-body text-center">
                            <h6 class="card-title">Proyektor</h6>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 12rem;">
                        <img src="{{ asset('images/gamelan.png') }}" class="card-img-top p-3" alt="Gamelan">
                        <div class="card-body text-center">
                            <h6 class="card-title">Gamelan</h6>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 12rem;">
                        <img src="{{ asset('images/peralatan.png') }}" class="card-img-top p-3" alt="Peralatan">
                        <div class="card-body text-center">
                            <h6 class="card-title">Peralatan</h6>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slide Kedua (bisa ganti item lain kalau tersedia) --}}
            <div class="carousel-item">
                <div class="d-flex justify-content-center gap-4">
                    <div class="card shadow-sm" style="width: 12rem;">
                        <img src="{{ asset('images/proyektor.png') }}" class="card-img-top p-3" alt="Proyektor">
                        <div class="card-body text-center">
                            <h6 class="card-title">Proyektor</h6>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 12rem;">
                        <img src="{{ asset('images/gamelan.png') }}" class="card-img-top p-3" alt="Gamelan">
                        <div class="card-body text-center">
                            <h6 class="card-title">Gamelan</h6>
                        </div>
                    </div>
                    <div class="card shadow-sm" style="width: 12rem;">
                        <img src="{{ asset('images/peralatan.png') }}" class="card-img-top p-3" alt="Peralatan">
                        <div class="card-body text-center">
                            <h6 class="card-title">Peralatan</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#itemCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#itemCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


   
        <section class="calendar section">
            <div class="calendar-title-box">
                Kalender Peminjaman
            </div>
            <div id="calendar"></div>
        </section>



    </main>

    {{-- Bootstrap JS --}}
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
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            events: '/calendar-events',
            eventDisplay: 'block',
            displayEventTime: true,
            eventDidMount: function(info) {
                // Tooltip on hover
                tippy(info.el, {
                    content: info.event.title,
                    placement: 'top',
                    arrow: true,
                });
            }
        });

        calendar.render();
    });
</script>


    <style>
        #calendar {
            max-width: 85%;
            /* Resize calendar to smaller width */
            margin: 20px auto;
            margin-top: 50px;
            z-index: 1;
            position: relative;
        }

        .calendar-title-box {
            border: 2px solid #0d6efd;
            /* Outline biru */
            border-radius: 8px;
            padding: 10px 16px;
            display: inline-block;
            /* Agar kotaknya hanya selebar teks */
            font-weight: bold;
            font-size: 1.2rem;
            background-color: #ffffff;
            color: #0d6efd;
            margin-bottom: 1rem;
        }

        .fc-event {
        font-size: 13px;
        padding: 2px 4px;
        border-radius: 6px;
        }

        .fc-daygrid-event-dot {
            display: none; /* Hilangkan titik kecil */
        }

        .fc .fc-toolbar-title {
            font-size: 1.4rem;
            font-weight: bold;
        }
    </style>


@endsection