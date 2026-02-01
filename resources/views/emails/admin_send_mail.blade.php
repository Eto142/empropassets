<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $subject ?? 'Message from Admin' }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height:1.6; color:#333;">
    <div style="max-width:700px; margin:0 auto; padding:20px;">
        <h2 style="margin-bottom:8px;">{{ $subject ?? 'Message from Admin' }}</h2>
        <div style="white-space:pre-wrap;">{{ $messageBody ?? '' }}</div>
        <hr>
        <div style="font-size:12px; color:#777;">This email was sent by the site administrator.</div>
    </div>
</body>
</html>
