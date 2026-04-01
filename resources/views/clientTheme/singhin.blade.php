<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shree</title>

    @include('clientTheme.include.style')

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #cde5f6ff, #ddfde5ff);
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #ffffff;
            border-radius: 18px;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.12);
        }

        .brand-title {
            text-align: center;
            font-weight: 700;
            font-size: 26px;
            color: #2563eb;
            margin-bottom: 5px;
        }

        .brand-sub {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 14px;
        }

        label {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #d1d5db;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37,99,235,0.15);
        }

        .btn-login {
            background: #2563eb;
            border: none;
            color: #fff;
            border-radius: 30px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #1e40af;
        }

        .btn-reset {
            background: transparent;
            border: 1px solid #c7d2fe;
            color: #2563eb;
            border-radius: 30px;
            padding: 12px;
            width: 100%;
            margin-top: 10px;
        }

        .btn-reset:hover {
            background: #eff6ff;
        }

        .signup-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .signup-text a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .alert-danger {
            border-radius: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="brand-title">CackShop</div>
    <div class="brand-sub">Sign in to your account</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="checklogin" method="post">
        @csrf

        <div class="mb-3">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>

        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>

        <button type="submit" class="btn-login">
            Login
        </button>

        <button type="reset" class="btn-reset">
            Reset
        </button>

        <div class="signup-text">
            Don’t have an account?
            <a href="{{ url('singhup') }}">Sign up</a>
        </div>

    </form>
</div>

</body>
</html>
