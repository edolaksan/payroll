<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h2>Login Admin</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.login.post') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <!-- Tambahkan link ke halaman register -->
        <p class="mt-4">
            Belum punya akun? <a href="{{ route('auth.register') }}">Register di sini</a>
        </p>
    </div>
</div>
@endsection
