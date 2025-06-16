@extends('layouts.dashboard') {{-- sesuaikan dengan layoutmu --}}

@section('content')
<div class="container mt-4">

  <!-- Judul dan Tombol -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold">Kalender Peminjaman</h5>
    <a href="{{ route('user.peminjaman.create') }}" class="btn btn-primary rounded-pill">
      Ajukan Peminjaman <i class="bi bi-plus-circle ms-1"></i>
    </a>
  </div>

  <!-- Kalender (static untuk sekarang, bisa diganti FullCalendar atau package lain) -->
  <div class="p-3 bg-light rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <button class="btn btn-sm btn-outline-secondary">&lt;</button>
      <strong>MEI 2025</strong>
      <button class="btn btn-sm btn-outline-secondary">&gt;</button>
    </div>

    <table class="table table-bordered text-center">
      <thead class="table-light">
        <tr>
          <th>SENIN</th>
          <th>SELASA</th>
          <th>RABU</th>
          <th>KAMIS</th>
          <th>JUMAT</th>
          <th>SABTU</th>
          <th>MINGGU</th>
        </tr>
      </thead>
      <tbody>
        <!-- Baris-baris kalender -->
        @php
          $days = [
            ['28', '', '', '', '', '', ''],
            ['5', '<span class="dot bg-primary"></span><span class="dot bg-success"></span><span class="dot bg-danger"></span>', '6', '', '', '2<span class=dot bg-danger></span>', ''],
            ['12', '', '13', '', '', '', ''],
            ['19', '20<span class="dot bg-danger"></span>', '', '', '', '', ''],
            ['26<span class="dot bg-primary"></span>', '', '', '', '', '', '1']
          ];
        @endphp

        @foreach ($days as $week)
          <tr>
            @foreach ($week as $day)
              <td>{!! $day !!}</td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

<style>
  .dot {
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin: 0 1px;
  }
</style>
@endsection
