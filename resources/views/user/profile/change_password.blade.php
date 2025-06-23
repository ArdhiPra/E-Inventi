@extends('layouts.profilenavbar')

@section('profile')
    <h3 class="mb-4">Ubah Password</h3>

    {{-- Tampilkan notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (is_null(auth()->user()->password))
        {{-- Form jika user belum punya password (login via Google) --}}
        <form method="POST" action="{{ route('user.password.set') }}">
            @csrf
            <div class="mb-3">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" name="new_password" id="new_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan Password</button>
        </form>
    @else
        {{-- Form ubah password biasa --}}
        <form method="POST" action="{{ route('user.password.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="current_password" class="form-label">Password Saat Ini</label>
                <input type="password" name="current_password" id="current_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" name="new_password" id="new_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Password</button>
        </form>
    @endif
@endsection
