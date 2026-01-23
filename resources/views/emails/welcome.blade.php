<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
</head>
<body>

    <h2>Welcome, {{ $user->name }} 🎉</h2>

    <p>Your account has been successfully created.</p>

    <p>You can now login and start using {{ config('app.name') }}.</p>

    <p>We’re excited to have you onboard 🚀</p>

    <br>

    <p>
        Best Regards,<br>
        <strong>{{ config('app.name') }} Team</strong>
    </p>

</body>
</html>
