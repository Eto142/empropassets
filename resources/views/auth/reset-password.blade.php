<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Emaar Properties Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background-color: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .reset-card {
            background-color: #fff;
            border-radius: 15px;
            padding: 50px 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 450px;
        }

        .reset-header { 
            text-align: center; 
            margin-bottom: 35px; 
        }

        .logo-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .reset-header h2 {
            font-size: 24px;
            color: #000;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .reset-header p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        .form-group { 
            margin-bottom: 25px; 
            position: relative; 
        }

        .form-group label { 
            display: block; 
            font-size: 14px; 
            color: #333; 
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input::placeholder { 
            color: #999; 
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

        .btn-reset {
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

        .btn-reset:hover { 
            background-color: #1e40af; 
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: #333;
        }

        .form-footer a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .form-footer a:hover { 
            text-decoration: underline; 
        }

        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #047857;
            padding: 14px 16px;
        }

        .alert-danger {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 14px 16px;
        }

        .error-text {
            color: #ef4444;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        @media (max-width: 768px) {
            .reset-card { 
                padding: 40px 25px; 
            }
            .reset-header h2 { 
                font-size: 20px; 
            }
        }
    </style>
</head>
<body>

<div class="reset-card">
    <div class="reset-header">
        <div class="logo-section">
             <a href="{{ route('homepage') }}"><img src="{{ asset('images/logo.png') }}" width="170px"></a>
        </div>
        <h2>Create New Password</h2>
        <p>Enter your email and a new password to reset your account.</p>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('reset.password.submit') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required>
            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">New Password*</label>
            <input type="password" id="password" name="password" placeholder="Enter new password (minimum 8 characters)" required>
            <i class="bi bi-eye toggle-password" onclick="togglePassword('password', this)"></i>
            @error('password')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password*</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password" required>
            <i class="bi bi-eye toggle-password" onclick="togglePassword('password_confirmation', this)"></i>
            @error('password_confirmation')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-reset">Reset Password</button>

        <div class="form-footer">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </form>
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
</div>
</body>
</html>
