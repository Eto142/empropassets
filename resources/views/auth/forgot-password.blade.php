<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Emaar Properties Assets</title>
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

        .forgot-card {
            background-color: #fff;
            border-radius: 15px;
            padding: 50px 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 450px;
        }

        .forgot-header { 
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

        .forgot-header h2 {
            font-size: 24px;
            color: #000;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .forgot-header p {
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

        .btn-send {
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

        .btn-send:hover { 
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
            .forgot-card { 
                padding: 40px 25px; 
            }
            .forgot-header h2 { 
                font-size: 20px; 
            }
        }
    </style>
</head>
<body>

<div class="forgot-card">
    <div class="forgot-header">
        <div class="logo-section">
             <a href="{{ route('homepage') }}"><img src="{{ asset('images/logo.png') }}" width="170px"></a>
        </div>
        <h2>Reset Your Password</h2>
        <p>Enter your email address and we'll send you a link to reset your password.</p>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('forgot.password.submit') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-send">Send Reset Link</button>

        <div class="form-footer">
            Remember your password? <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
