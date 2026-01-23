<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verify OTP - Emaar Properties Assets</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background-color: #f5f5f5; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }

    .register-container { display: flex; min-height: 100vh; }

    /* Left image panel */
    .register-left {
        flex: 1;
        position: relative;
        background-image: url('https://images.unsplash.com/photo-1572120360610-d971b9f6f7f6?crop=entropy&cs=tinysrgb&fit=crop&h=900&w=600');
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

    .property-info { position: relative; z-index: 1; }
    .property-name { font-size: 32px; font-weight: 700; margin-bottom: 8px; }
    .property-details { font-size: 16px; color: rgba(255,255,255,0.9); }

    /* Right form panel */
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
    .register-header h1 { font-size: 28px; font-weight: 900; color: #000; }
    .register-header p { font-size: 14px; color: #6b7280; margin-top: 6px; }

    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-size: 14px; color: #333; margin-bottom: 6px; font-weight: 500; }
    .form-group input { width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; transition: border-color 0.3s; }
    .form-group input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1); }

    .btn-continue { width: 100%; padding: 14px; background-color: #2563eb; color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 700; cursor: pointer; transition: background-color 0.3s; }
    .btn-continue:hover { background-color: #1e4bb8; }

    .form-footer { text-align: center; font-size: 14px; color: #666; margin-top: 20px; }
    .form-footer a { color: #2563eb; text-decoration: none; font-weight: 600; }
    .form-footer a:hover { text-decoration: underline; }

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
            <div class="property-name">Verify Your Email</div>
            <div class="property-details">Enter the code sent to your email</div>
        </div>
    </div>

    <div class="register-right">
        
        <form method="POST" action="{{ route('verify.otp.store') }}" class="register-form">
            @csrf
            <div class="register-header">
                <h1>Hello {{ session('register_data.name') ?? 'Investor' }},</h1>
                <p>Enter the 6-digit verification code sent to your email to complete registration.</p>
            </div>

            <!-- OTP Input -->
            <div class="form-group">
                <label for="otp">Verification Code</label>
                <input type="text" id="otp" name="otp" placeholder="Enter 6-digit code" maxlength="6" required>
            </div>

            <button type="submit" class="btn-continue">Verify</button>

            <div class="form-footer">
                Didn't receive the code? <a href="{{ route('personal.info') }}">Resend</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
