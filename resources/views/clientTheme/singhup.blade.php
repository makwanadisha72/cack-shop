<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #1a73e8, #0da598);
            color: #fff;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.2);
        }
        h1,h4 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        input:focus {
            outline: none;
            box-shadow: 0 0 5px #2575fc;
        }
        .btn {
            display: inline-block;
            width: 48%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .btn-submit {
            background: #1d976c;
            color: #fff;
        }
        .btn-submit:disabled {
            background: #555;
            cursor: not-allowed;
        }
        .btn-reset {
            background: #f44336;
            color: #fff;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6 form-container">
            <h1>Welcome to Shree</h1>
            <h4 class="text-center">Register</h4>
            <form method="post" action="{{route('customer.store')}}" id="registrationForm">
                @csrf
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-submit" id="submitBtn" disabled>Submit</button>
                    <button type="reset" class="btn btn-reset">Reset</button>
                </div>
                <h4 class="text-center mt-3">
                    alredy have an account? <a href="{{url('singhin')}}" class="text-primary">Sign in</a>
                </h4>
            </form>
        </div>
    </div>

    <script>
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const submitBtn = document.getElementById('submitBtn');

        // Enable or disable submit button based on password match
        function checkPasswords() {
            if (password.value === confirmPassword.value && password.value !== '') {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }

        password.addEventListener('input', checkPasswords);
        confirmPassword.addEventListener('input', checkPasswords);
    </script>
</body>
</html>
