@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #c4d2ffff, #fcc7e4ff);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.12);
        padding: 40px;
        width: 100%;
        max-width: 450px;
    }

    .login-card h4 {
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
        color: #1f2937;
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

    .forgot-link {
        display: block;
        margin-top: 15px;
        text-align: center;
        font-weight: 500;
        color: #6366f1;
        text-decoration: none;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <h4>{{ __('Login to Cack Shop') }}</h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autofocus>

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

            <!-- Remember -->
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <!-- Button -->
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            <!-- Forgot -->
            @if (Route::has('password.request'))
                <a class="forgot-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </form>
    </div>
</div>
@endsection
