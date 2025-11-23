<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shree</title>
    @include('clientTheme.include.style')
    <style>
        body {
            background: linear-gradient(to left, #460174, #690a0a);
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container {
            margin-top: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background: #0c54b8;
            border: none;
            border-radius: 20px;
            color: #fff;
        }
        .btn-custom:hover {
            background: #1a73e8;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6 login-container">
            <h2 class="text-center">Welcome to Shree</h2>
            <p class="text-center">Log in to your account</p>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                  @foreach ($errors->all() as $error)
                      <p>{{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                          <span area-hiddeen="true">&times;</span></button></p>
                  @endforeach
                </div>
              @endif
            <form action="checklogin" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input autofocus type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-custom btn-block">Login</button>
                <button type="reset" class="btn btn-custom  btn-block">Reset</button>
                <p class="text-center mt-3">
                    Don't have an account? <a href="{{url('singhup')}}" class="text-primary">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
