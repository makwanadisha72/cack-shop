@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg,  #c4d2ffff, #fcc7e4ff);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .register-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.12);
        padding: 40px;
        width: 100%;
        max-width: 480px;
    }

    .register-card h4 {
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
        color: #1f2937;
    }

    .form-label {
        font-weight: 500;
        color: #374151;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #d1d5db;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 2px rgba(99,102,241,0.2);
    }

    .btn-primary {
        background: linear-gradient(90deg, #6366f1, #8b5cf6);
        border: none;
        border-radius: 30px;
        padding: 12px;
        width: 100%;
        font-weight: 600;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #4f46e5, #7c3aed);
    }
</style>

<div class="register-wrapper">
    <div class="register-card">

        <h4>{{ __('Create Account') }}</h4>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required>

                @error('email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password" required>

                @error('password')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                    class="form-control"
                    name="password_confirmation" required>
            </div>

            <!-- Button -->
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>

        </form>
    </div>
</div>
@endsection
