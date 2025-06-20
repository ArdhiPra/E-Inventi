@extends('layouts.profilenavbar')

@section('profile')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 profile-container d-flex"> <!-- Tambahkan profile-container -->

            <!-- Sidebar Profil -->
            <div class="me-4 profile-sidebar" style="width: 250px;"> <!-- Tambahkan profile-sidebar -->
                <div class="text-center mb-3">
                    <div class="bg-primary text-white rounded-circle mx-auto profile-avatar"> <!-- Tambahkan profile-avatar -->
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h5 class="mt-2">Hello, <strong>{{ $user->name }}</strong></h5>
                </div>

                <div class="list-group">
                    <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action active">
                        <i class="bi bi-person-fill me-2"></i> Informasi Akun
                    </a>
                    <a href="#" class="list-group-item list-group-item-action text-primary">
                        <i class="bi bi-receipt me-2"></i> Riwayat Transaksi
                    </a>
                    <a href="#" class="list-group-item list-group-item-action text-primary">
                        <i class="bi bi-key me-2"></i> Ubah Password
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Formulir Profil -->
            <div class="flex-grow-1 profile-form"> <!-- Tambahkan profile-form -->
                <h3 class="mb-4">Informasi Akun</h3>

                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" 
                                value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" 
                                value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                                value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update Information</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
