@extends('layouts_admin.main')

@section('title', 'Profile Admin')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 fw-bold">Profile</h3>

    <div class="d-flex justify-content-center">
        <div class="border rounded p-4 shadow-sm" style="width: 400px;">
            <table class="table table-borderless mb-3">
                <tr>
                    <td><strong>Username</strong></td>
                    <td class="text-muted">{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td><strong>Password</strong></td>
                    <td class="text-muted">••••••••</td>
                </tr>
                <tr>
                    <td><strong>Level</strong></td>
                    <td class="text-muted">{{ Auth::user()->level ?? 'Admin' }}</td>
                </tr>
                <tr>
                    <td><strong>Dibuat Pada</strong></td>
                    <td class="text-muted">{{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y') }}</td>
                </tr>
            </table>

            <div class="d-flex justify-content-between">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark">
                        <i class="bi bi-box-arrow-left me-1"></i> Log Out
                    </button>
                </form>

                <a href="{{ route('admin.profile.edit') }}" class="btn btn-outline-secondary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection

