@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h2>Login</h2>
<h6>E-InvenTI</h6>

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="/login" method="POST">
  @csrf
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="example@gmail.com">
    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required placeholder="******">
    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
  </div>

  <button class="btn btn-primary">Login</button>
  <a href="/register" class="btn btn-link">Belum punya akun?</a>
</form>

<div class="mt-4 text-center">
    <p style="font-size: 14px; margin-bottom: 8px;">- Atau Akses Cepat -</p>
    <a href="{{ route('google.redirect') }}">
        <img src="{{ asset('images/google.png') }}" 
            alt="Login dengan Google"
            style="width: 175px; height: auto; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
    </a>
  </div>

@endsection
