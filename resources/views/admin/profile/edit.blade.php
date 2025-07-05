@extends('layouts_admin.main')

@section('title', 'Edit Profil Admin')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold">Edit Profile</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validasi error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="border rounded p-4 shadow-sm" style="width: 400px;">
        <form action="{{ route('admin.profile.update') }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password Baru (Opsional)</label>
        <input type="password" class="form-control" name="password">
    </div>

    <!-- Password Confirmation -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

        </div>
    </div>
</div>
@endsection
