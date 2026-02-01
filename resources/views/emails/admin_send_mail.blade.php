<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $subjectLine ?? 'Message from Admin' }}</title>
    <style>
        body { background:#f4f6fb; margin:0; padding:20px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; color:#23303b; }
        .email-container { max-width:700px; margin:0 auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 6px 30px rgba(29,41,55,0.08); }
        .email-header { padding:18px 24px; background: linear-gradient(90deg,#0d6efd 0%, #2563eb 100%); color:#fff; display:flex; align-items:center; gap:16px; }
        .logo { height:40px; }
        .email-body { padding:24px; }
        .email-title { margin:0 0 12px 0; font-size:20px; color:#0f1724; }
        .email-message { white-space:pre-wrap; font-size:15px; line-height:1.6; color:#334155; }
        .divider { height:1px; background:#eef2ff; margin:20px 0; border-radius:1px; }
        .footer { padding:16px 24px; background:#fbfdff; font-size:13px; color:#64748b; }
        .btn { display:inline-block; padding:10px 16px; background:#0d6efd; color:#fff; border-radius:6px; text-decoration:none; }
        @media (max-width:600px){ .email-header{padding:12px} .email-body{padding:16px} }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img class="logo" src="{{ asset('assets/images/logo.svg') }}" alt="Logo">
            <div>
                <strong>{{ config('app.name', 'EMAAR ASSETS') }}</strong>
                <div style="font-size:12px; opacity:0.9">Administrator Message</div>
            </div>
        </div>

        <div class="email-body">
            <h3 class="email-title">{{ $subjectLine ?? 'Message from Admin' }}</h3>

            <div class="email-message">{{ $messageBody ?? '' }}</div>

            <div class="divider"></div>

            <p style="margin:0">If you have questions, reply to this email or contact support.</p>
            <p style="margin-top:12px"><a class="btn" href="{{ config('app.url') }}">Visit Dashboard</a></p>
        </div>

        <div class="footer">
            <div>{{ config('app.name', 'EMAAR ASSETS') }} — {{ config('app.url') }}</div>
            <div style="margin-top:6px">&copy; {{ date('Y') }} {{ config('app.name', 'EMAAR ASSETS') }}. All rights reserved.</div>
        </div>
    </div>
</body>
</html>
