<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | CackShop</title>

<style>
* {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    background:linear-gradient(120deg, #dbeefcff, #effff2ff);
    display: flex;
    align-items: center;
    justify-content: center;
}

/* MAIN WRAPPER */
.auth-wrapper {
    width: 95%;
    max-width: 1000px;
    min-height: 520px;
    display: flex;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0,0,0,0.5);
}

/* LEFT PANEL */
.auth-left {
    flex: 1;
    background: linear-gradient(160deg, #2563eb, #1e3a8a);
    color: #fff;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.auth-left h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
}

.auth-left p {
    font-size: 16px;
    line-height: 1.6;
    opacity: 0.9;
}

.auth-left ul {
    margin-top: 25px;
    padding-left: 18px;
}

.auth-left li {
    margin-bottom: 10px;
    font-size: 14px;
}

/* RIGHT PANEL */
.auth-right {
    flex: 1;
    background: #ffffff;
    padding: 45px;
    display: flex;
    align-items: center;
}

.form-box {
    width: 100%;
}

.form-box h2 {
    font-weight: 700;
    margin-bottom: 5px;
    color: #0f172a;
}

.form-box span {
    font-size: 14px;
    color: #64748b;
}

/* FORM */
.form-group {
    margin-top: 18px;
}

label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #334155;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
    font-size: 14px;
}

input:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 2px rgba(37,99,235,0.15);
}

/* BUTTON */
.btn-register {
    width: 100%;
    margin-top: 25px;
    padding: 13px;
    border-radius: 8px;
    border: none;
    background: #2563eb;
    color: #fff;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-register:disabled {
    background: #94a3b8;
    cursor: not-allowed;
}

.btn-register:hover:not(:disabled) {
    background: #1e40af;
}

/* FOOTER */
.bottom-text {
    margin-top: 18px;
    font-size: 14px;
    text-align: center;
}

.bottom-text a {
    color: #2563eb;
    font-weight: 600;
    text-decoration: none;
}

/* RESPONSIVE */
@media(max-width: 900px) {
    .auth-wrapper {
        flex-direction: column;
    }
    .auth-left {
        text-align: center;
    }
}
</style>
</head>

<body>

<div class="auth-wrapper">

    <!-- LEFT BRAND PANEL -->
    <div class="auth-left">
        <h1>Welcome to CackShop</h1>
        <p>
            Join our platform to explore premium products,
            smooth checkout, and fast delivery.
        </p>

        <ul>
            <li>✔ Secure & Fast Shopping</li>
            <li>✔ Quality Checked Products</li>
        </ul>
    </div>

    <!-- RIGHT FORM PANEL -->
    <div class="auth-right">
        <div class="form-box">
            <h2>Create Account</h2>
            <span>Start your journey with CackShop</span>

            <form method="post" action="{{ route('customer.store') }}">
                @csrf

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPassword" required>
                </div>

                <button type="submit" class="btn-register" id="submitBtn" disabled>
                    Create Account
                </button>

                <div class="bottom-text">
                    Already have an account?
                    <a href="{{ url('singhin') }}">Login</a>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const submitBtn = document.getElementById('submitBtn');

function validate() {
    submitBtn.disabled = !(password.value && password.value === confirmPassword.value);
}

password.addEventListener('input', validate);
confirmPassword.addEventListener('input', validate);
</script>

</body>
</html>
