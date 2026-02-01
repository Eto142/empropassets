<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}  Account Approved</title>
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
            background-color: #0047AB;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .header img { max-width: 150px; margin-bottom: 10px; }
        .content { padding: 30px 20px; text-align: center; }
        .content h2 { color: #0047AB; margin-bottom: 12px; }
        .content p { font-size: 16px; line-height: 1.6; margin-bottom: 12px; }
        .button { display: inline-block; background-color: #0047AB; color: #fff; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: bold; margin-top: 12px; }
        .footer { padding: 20px; font-size: 12px; color: #777; text-align: center; }
        @media (max-width: 600px) { .container { margin: 20px; } }
    </style>
    </head>
<body>
    <div class="container">
        <!-- Header with logo -->
        <div class="header">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="{{ config('app.name') }} Logo">
            <h1>{{ config('app.name') }}</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Account Approved</h2>
            <p>Hi {{ $user->first_name ?? $user->name ?? $user->email }},</p>
            <p>Great news  your account has been approved. You can now log in and start using {{ config('app.name') }} to explore investment opportunities and manage your portfolio.</p>
            <p>We recommend securing your account and completing your profile for the best experience.</p>
            <a href="{{ config('app.url') }}" class="button">Go to Dashboard</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
