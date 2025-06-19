@extends('layouts.app')

@section('profile')
    @include('user.profile.profilenavbar')
    @include('user.profile.profilemain')

<h3>Informasi Akun</h3>
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Nama</label>
        <input type="text" name="username" class="form-control" value="{{ Auth::user()->name }}" required>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ Auth::user()->telepon }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required>{{ Auth::user()->alamat }}</textarea>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update Information</button>
</form>
@endsection
