<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Your account is approved</title>
  <style>
    body { background:#f4f6fb; margin:0; padding:20px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif; color:#23303b; }
    .email-container { max-width:700px; margin:0 auto; background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 6px 30px rgba(29,41,55,0.08); }
    .email-header { padding:18px 20px; background: linear-gradient(90deg,#0d6efd 0%, #2563eb 100%); color:#fff; display:flex; align-items:center; gap:14px; }
    .logo { height:44px; }
    .email-body { padding:22px; }
    .email-title { margin:0 0 8px 0; font-size:20px; color:#0f1724; }
    .lead { margin:0 0 12px 0; font-size:15px; color:#334155; }
    .steps { margin:12px 0 0 18px; color:#334155; }
    .steps li { margin:8px 0; }
    .note { font-size:13px; color:#556; margin-top:12px; }
    .divider { height:1px; background:#eef2ff; margin:18px 0; border-radius:1px; }
    .footer { padding:14px 20px; background:#fbfdff; font-size:13px; color:#64748b; }
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
      <h3 class="email-title">Account approved  welcome aboard!</h3>

      <p class="lead">Hi {{ $user->first_name ?? $user->name ?? $user->email }}, your account is now active. We’ve verified your details  you’re all set to start using {{ config('app.name') }}.</p>

      <p style="margin:12px 0;"><a class="btn" href="{{ config('app.url') }}">Open your dashboard</a></p>

      <div class="divider"></div>

      <p style="margin:0 0 6px 0; font-weight:600; color:#0f1724">Quick next steps</p>
      <ul class="steps">
        <li><strong>Secure your account:</strong> Set a strong password and enable 2FA in your profile.</li>
        <li><strong>Add payment method:</strong> Link a bank or crypto wallet to deposit funds.</li>
        <li><strong>Explore investments:</strong> Browse available properties and start investing.</li>
      </ul>

      <p class="note">If this wasn’t requested by you or you need help, reply to this email or contact <a href="mailto:{{ config('mail.from.address', 'support@example.com') }}">support</a>.</p>

      <div class="divider"></div>
      <p style="margin:0; font-size:13px; color:#64748b">Thanks,<br>{{ config('app.name') }} Team</p>
    </div>

    <div class="footer">
      <div>{{ config('app.name') }}  {{ config('app.url') }}</div>
      <div style="margin-top:6px">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</div>
    </div>
  </div>
</body>
</html>
