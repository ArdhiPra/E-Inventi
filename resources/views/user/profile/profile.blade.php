@extends('layouts.profilenavbar')

@section('profile')
    <h3 class="profile-form-title">Informasi Akun</h3>

    {{-- Tampilkan notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.profile.update') }}" method="POST" class="profile-form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-input" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">Telepon</label>
            <input type="text" class="form-input" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
            @error('phone')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-input" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-textarea" id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
            @error('address')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Perbaharui</button>
    </form>
@endsection
