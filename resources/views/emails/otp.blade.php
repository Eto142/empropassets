<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OTP Verification - Empropassets</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background-color: #0047AB; /* Empropassets blue */
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .content {
            padding: 30px 20px;
            text-align: center;
        }
        .content h2 {
            color: #0047AB;
            margin-bottom: 10px;
        }
        .otp-code {
            font-size: 32px;
            letter-spacing: 8px;
            font-weight: bold;
            margin: 20px 0;
            color: #FF6B6B; /* Accent color */
        }
        .footer {
            padding: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        .button {
            display: inline-block;
            background-color: #0047AB;
            color: #fff;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px;
            }
            .otp-code {
                font-size: 28px;
                letter-spacing: 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with logo -->
        <div class="header">
            <img src="https://empropassets.com/logo.png" alt="Empropassets Logo">
            <h1>Empropassets</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Email Verification</h2>
            <p>Use the verification code below to complete your registration or login:</p>
            <div class="otp-code">{{ $otp }}</div>
            <p>This code expires in 5 minutes.</p>
            <p>If you didn't request this, please ignore this email.</p>
            <a href="#" class="button">Visit Empropassets</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Empropassets. All rights reserved.<br>
         
        </div>
    </div>
</body>
</html>
