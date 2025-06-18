@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="mx-auto mt-5" style="max-width: 400px;">
  <div class="card p-4 shadow">
    <div class="text-center mb-4">
      <h2 class="mb-1">Register</h2>
      <h6 class="text-muted">e-InvenTI</h6>
    </div>

    <form action="/register" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="Einventi example">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="example@gmail.com">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required placeholder="Minimal 6 karakter">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required placeholder="******">
      </div>

      <div class="d-grid">
        <button class="btn btn-success">Daftar</button>
      </div>

      <div class="text-center mt-3">
        <a href="/login" class="text-decoration-none">Sudah punya akun?</a>
      </div>
    </form>
  </div>
</div>
@endsection
