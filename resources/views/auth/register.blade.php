@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h2>Register</h2>
<h6>E-InvenTI</h6>

<form action="/register" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="Einventi example">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="example@gmail.com">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required placeholder="Minimal 6 karakter">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required placeholder="******">
    </div>

    <button class="btn btn-success">Daftar</button>
    <a href="/login" class="btn btn-link">Sudah punya akun?</a>
</form>
@endsection
