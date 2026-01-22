<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Emaar Properties Assets</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        background-color: #f5f5f5;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }

    .register-container {
        display: flex;
        min-height: 100vh;
    }

    .register-left {
        flex: 1;
        position: relative;
        background-image: url('/images/modern-house.jpg');
        background-size: cover;
        background-position: center;
        border-radius: 15px;
        margin: 20px;
        display: flex;
        align-items: flex-end;
        padding: 30px;
        color: white;
    }

    .register-left::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.45);
        border-radius: 15px;
    }

    .property-info {
        position: relative;
        z-index: 1;
    }

    .property-name { font-size: 32px; font-weight: 700; margin-bottom: 8px; }
    .property-details { font-size: 16px; color: rgba(255,255,255,0.9); }

    .register-right {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }

    .register-form {
        width: 100%;
        max-width: 450px;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .register-header { text-align: center; margin-bottom: 30px; }
    .register-header h1 { font-size: 32px; font-weight: 900; color: #000; }

    .form-group { margin-bottom: 20px; position: relative; }
    .form-group label { display: block; font-size: 14px; color: #333; margin-bottom: 6px; font-weight: 500; }
    .form-group input {
        width: 100%;
        padding: 12px 45px 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
    }
    .form-group input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .toggle-password {
        position: absolute;
        top: 37px;
        right: 15px;
        cursor: pointer;
        color: #888;
        font-size: 18px;
    }

    .btn-continue {
        width: 100%;
        padding: 14px;
        background-color: #2563eb;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-continue:hover { background-color: #1e4bb8; }

    .form-footer { text-align: center; font-size: 14px; color: #666; margin-top: 20px; }
    .form-footer a { color: #2563eb; text-decoration: none; font-weight: 600; }
    .form-footer a:hover { text-decoration: underline; }

    .enter-hint { text-align: center; font-size: 13px; color: #999; margin-top: 10px; }

    @media (max-width: 768px) {
        .register-container { flex-direction: column; }
        .register-left { min-height: 250px; margin: 20px 20px 10px 20px; }
        .register-right { padding: 30px 20px; }
    }
</style>
</head>
<body>

<div class="register-container">
    <div class="register-left">
        <div class="property-info">
            <div class="property-name">The Solano</div>
            <div class="property-details">Scottsdale, AZ | 2.2K Investors</div>
        </div>
    </div>

    <div class="register-right">
        <form id="registrationForm" method="POST" action="{{ route('register.submit') }}" class="register-form">
            @csrf
            <div class="register-header">
                <h1>Create your account</h1>
            </div>

            <!-- Full Name -->
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="bi bi-eye toggle-password" onclick="togglePassword('password', this)"></i>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                <i class="bi bi-eye toggle-password" onclick="togglePassword('password_confirmation', this)"></i>
            </div>

            <button type="submit" class="btn-continue">CONTINUE</button>
            <div class="enter-hint">← or press Enter to Continue</div>

            <div class="form-footer">
                Already have an account? <a href="{{ route('login') }}">Log in</a> instead.
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword(fieldId, icon) {
    const input = document.getElementById(fieldId);
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = "password";
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
