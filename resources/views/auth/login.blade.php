@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="mx-auto mt-5" style="max-width: 400px;">
  <div class="card p-4 shadow">
    <div class="text-center mb-4">
      <h2 class="mb-1">Login</h2>
      <h6 class="text-muted">E-InvenTI</h6>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/login" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="example@gmail.com">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required placeholder="******">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="d-grid">
        <button class="btn btn-primary">Login</button>
      </div>

      <div class="text-center mt-3">
        <a href="/register" class="text-decoration-none">Belum punya akun?</a>
      </div>
    </form>

    <div class="mt-4 text-center">
      <p class="small mb-2">- Atau Akses Cepat -</p>
      <a href="{{ route('google.redirect') }}">
        <img src="{{ asset('images/google.png') }}" 
             alt="Login dengan Google"
             style="width: 175px; height: auto; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
      </a>
    </div>
  </div>
</div>
@endsection