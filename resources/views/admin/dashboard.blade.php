@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h2>Selamat datang, Admin!</h2>
<p>Ini adalah halaman dashboard untuk admin.</p>

<form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form> 
@endsection