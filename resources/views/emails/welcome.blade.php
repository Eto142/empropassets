<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Empropassets</title>
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
            margin-bottom: 15px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
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
        .footer {
            padding: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        @media (max-width: 600px) {
            .container {
                margin: 20px;
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
            <h2>Welcome, {{ $user->name }} 🎉</h2>
            <p>Your account has been successfully created.</p>
            <p>You can now log in and start exploring Emaar’s real estate listings and services.</p>
            <p>We’re excited to have you onboard 🚀</p>
            <a href="{{ url('/') }}" class="button">Go to Dashboard</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Empropassets. All rights reserved.<br>
            123 Main Street, Your City, Country
        </div>
    </div>
</body>
</html>
