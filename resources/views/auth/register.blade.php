<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <h2>Register Admin</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.register.post') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</div>
@endsection
