@extends('layouts.dashboard')

@section('content')

{{-- Hero Section --}}
<div class="hero-section text-white text-center mb-4">
    <div class="overlay-text">
        <h2 class="fw-bold">Selamat atang di Sistem<br>Peminjaman HMJ TI</h2>
    </div>
</div>

{{-- Gambar-gambar item --}}
<div class="d-flex justify-content-center gap-3 mb-4">
    <img src="{{ asset('images/proyektor.png') }}" class="rounded-img" alt="Proyektor">
    <img src="{{ asset('images/gamelan.png') }}" class="rounded-img" alt="Gamelan">
    <img src="{{ asset('images/peralatan.png') }}" class="rounded-img" alt="Peralatan">    
</div>

{{-- Kalender --}}
<div class="calendar-box">
    <h5 class="mb-3">Kalender Peminjaman</h5>
    @include('user.components.calendar')
</div>

@endsection
