<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Your account is approved</title>
  <style>
    body { background:#f4f6fb; margin:0; padding:20px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; color:#23303b; }
    .email-container { max-width:700px; margin:0 auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 6px 30px rgba(29,41,55,0.08); }
    .email-header { padding:18px 24px; background: linear-gradient(90deg,#0d6efd 0%, #2563eb 100%); color:#fff; display:flex; align-items:center; gap:16px; }
    .logo { height:40px; }
    .email-body { padding:24px; }
    .email-title { margin:0 0 12px 0; font-size:20px; color:#0f1724; }
    .email-message { white-space:pre-wrap; font-size:15px; line-height:1.6; color:#334155; }
    .divider { height:1px; background:#eef2ff; margin:20px 0; border-radius:1px; }
    .footer { padding:16px 24px; background:#fbfdff; font-size:13px; color:#64748b; }
    .btn { display:inline-block; padding:10px 16px; background:#0d6efd; color:#fff; border-radius:6px; text-decoration:none; }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <img class="logo" src="{{ asset('assets/images/logo.svg') }}" alt="{{ config('app.name') }} logo">
      <div>
        <strong>{{ config('app.name') }}</strong>
        <div style="font-size:12px; opacity:0.9">Account Approval</div>
      </div>
    </div>

    <div class="email-body">
      <h3 class="email-title">Your account is approved</h3>

      <div class="email-message">
        Hello {{ $user->first_name ?? $user->name ?? $user->email }},

        <p style="margin-top:12px;">We’re pleased to inform you that your account has been approved. You can now log in and access your dashboard:</p>

        <p style="margin:12px 0;"><a class="btn" href="{{ config('app.url') }}">Go to Dashboard</a></p>

        <p style="margin-top:8px;">Next steps:</p>
        <ul>
          <li>Log in and verify your profile details</li>
          <li>Add payment methods if you plan to deposit</li>
          <li>Browse investment opportunities</li>
        </ul>

        <p>If you didn’t request this or have questions, reply to this message or contact support.</p>
      </div>

      <div class="divider"></div>
      <p style="margin:0; font-size:13px; color:#64748b">Thanks,<br>{{ config('app.name') }} Team</p>
    </div>

    <div class="footer">
      <div>{{ config('app.name') }} — {{ config('app.url') }}</div>
      <div style="margin-top:6px">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</div>
    </div>
  </div>
</body>
</html>
