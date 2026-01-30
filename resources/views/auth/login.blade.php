<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Emaar Properties Assets</title>
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

    .login-card {
        background-color: #fff;
        border-radius: 15px;
        padding: 50px 40px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        width: 100%;
        max-width: 450px;
    }

    .login-header { text-align: center; margin-bottom: 35px; }
    .logo-section {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .logo {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        color: white;
        font-size: 28px;
    }

    .logo-text {
        font-size: 22px;
        font-weight: 900;
        color: #000;
    }

    .login-header h2 {
        font-size: 22px;
        color: #666;
        font-weight: 400;
    }

    .form-group { margin-bottom: 20px; position: relative; }
    .form-group label { display: block; font-size: 14px; color: #666; margin-bottom: 6px; }
    .form-group input {
        width: 100%;
        padding: 12px 45px 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
    }
    .form-group input::placeholder { color: #999; }
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
    .btn-continue:hover { background-color: #1e40af; }

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
    .form-footer a:hover { text-decoration: underline; }

    @media (max-width: 768px) {
        .login-card { padding: 40px 25px; }
        .logo { width: 40px; height: 40px; font-size: 24px; }
        .logo-text { font-size: 20px; }
        .login-header h2 { font-size: 18px; }
    }
</style>
</head>
<body>

<div class="login-card">
    <div class="login-header">
        <div class="logo-section">
             <a class="navbar-brand" href="{{ route('homepage') }}"><img src ="{{ asset('images/logo.png') }}" width="170px"></a>
        </div>
        <h2>Welcome Back</h2>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #047857; padding: 14px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #10b981;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div style="background-color: #dbeafe; color: #1e40af; padding: 14px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #3b82f6;">
            {{ session('info') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background-color: #fee2e2; color: #991b1b; padding: 14px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #ef4444;">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div style="background-color: #fee2e2; color: #991b1b; padding: 14px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #ef4444;">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" id="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <label for="password">Password*</label>
                <a href="{{ route('forgot.password.form') }}" style="font-size: 13px; color: #2563eb; text-decoration: none;">Forgot password?</a>
            </div>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <i class="bi bi-eye toggle-password" onclick="togglePassword('password', this)"></i>
        </div>

        <button type="submit" class="btn-continue">Continue</button>

        <div class="form-footer">
            Don't have an account? <a href="{{ route('show.register') }}">Sign up</a>
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
