<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pending Approval - Emaar Properties Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .status-container {
            background-color: #fff;
            border-radius: 20px;
            padding: 60px 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
            text-align: center;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .status-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .status-title {
            font-size: 32px;
            font-weight: 900;
            color: #111827;
            margin-bottom: 20px;
        }

        .status-message {
            font-size: 16px;
            color: #6b7280;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .info-box {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 35px;
            text-align: left;
        }

        .info-box-title {
            font-size: 16px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-box-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .info-box-list li {
            padding: 10px 0;
            color: #6b7280;
            font-size: 14px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .info-box-list li i {
            color: #10b981;
            margin-top: 2px;
        }

        .user-details {
            background-color: #f9fafb;
            border: 2px dashed #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .user-details p {
            margin: 8px 0;
            font-size: 14px;
            color: #6b7280;
        }

        .user-details strong {
            color: #111827;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-back {
            padding: 14px 32px;
            background-color: #f3f4f6;
            color: #374151;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #e5e7eb;
            color: #111827;
            transform: translateY(-2px);
        }

        .btn-support {
            padding: 14px 32px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-support:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
            color: white;
        }

        .footer-note {
            margin-top: 35px;
            font-size: 13px;
            color: #9ca3af;
        }

        @media (max-width: 768px) {
            .status-container {
                padding: 40px 30px;
            }

            .status-icon {
                width: 100px;
                height: 100px;
                font-size: 50px;
            }

            .status-title {
                font-size: 26px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-back, .btn-support {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="status-container">
    <div class="status-icon">
        ⏳
    </div>

    <h1 class="status-title">Registration Under Review</h1>
    
    <p class="status-message">
        Thank you for registering with EMAAR Properties Assets. Your account is currently being reviewed by our team for verification and approval.
    </p>

    @if(isset($user))
    <div class="user-details">
        <p><strong>Registered Email:</strong> {{ $user->email }}</p>
        <p><strong>Full Name:</strong> {{ $user->name }}</p>
        <p><strong>Registration Date:</strong> {{ $user->created_at->format('F d, Y') }}</p>
    </div>
    @endif

    <div class="info-box">
        <div class="info-box-title">
            <i class="bi bi-info-circle-fill" style="color: #2563eb;"></i>
            What happens next?
        </div>
        <ul class="info-box-list">
            <li>
                <i class="bi bi-check-circle-fill"></i>
                <span>Our verification team will review your registration details within 24-48 hours</span>
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                <span>You will receive an email notification once your account is approved</span>
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                <span>After approval, you can login and access all platform features</span>
            </li>
            <li>
                <i class="bi bi-check-circle-fill"></i>
                <span>If additional information is needed, our team will contact you via email</span>
            </li>
        </ul>
    </div>

    <div class="action-buttons">
        <a href="{{ route('homepage') }}" class="btn-back">
            <i class="bi bi-house-door me-2"></i>Back to Home
        </a>
        <a href="mailto:support@emaarpropertiesassets.com" class="btn-support">
            <i class="bi bi-headset me-2"></i>Contact Support
        </a>
    </div>

    <p class="footer-note">
        <i class="bi bi-shield-check"></i> Your information is secure and protected
    </p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
