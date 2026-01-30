<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration Declined - Emaar Properties Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
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
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
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
            margin-bottom: 30px;
        }

        .rejection-reason {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border-left: 4px solid #ef4444;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 35px;
            text-align: left;
        }

        .rejection-reason-title {
            font-size: 14px;
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .rejection-reason-text {
            font-size: 15px;
            color: #7f1d1d;
            line-height: 1.6;
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
            color: #2563eb;
            margin-top: 2px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-home {
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

        .btn-home:hover {
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

            .btn-home, .btn-support {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="status-container">
    <div class="status-icon">
        ❌
    </div>

    <h1 class="status-title">Registration Not Approved</h1>
    
    <p class="status-message">
        Unfortunately, your account registration with EMAAR Properties Assets could not be approved at this time.
    </p>

    @if(isset($reason) && $reason)
    <div class="rejection-reason">
        <div class="rejection-reason-title">
            <i class="bi bi-exclamation-triangle-fill"></i> Reason for Decline
        </div>
        <div class="rejection-reason-text">
            {{ $reason }}
        </div>
    </div>
    @endif

    <div class="info-box">
        <div class="info-box-title">
            <i class="bi bi-lightbulb-fill" style="color: #2563eb;"></i>
            What you can do next
        </div>
        <ul class="info-box-list">
            <li>
                <i class="bi bi-arrow-right-circle-fill"></i>
                <span>Review the reason provided above carefully</span>
            </li>
            <li>
                <i class="bi bi-arrow-right-circle-fill"></i>
                <span>Contact our support team for clarification or assistance</span>
            </li>
            <li>
                <i class="bi bi-arrow-right-circle-fill"></i>
                <span>You may register again with corrected information</span>
            </li>
            <li>
                <i class="bi bi-arrow-right-circle-fill"></i>
                <span>Ensure all required documents and information are accurate</span>
            </li>
        </ul>
    </div>

    <div class="action-buttons">
        <a href="{{ route('homepage') }}" class="btn-home">
            <i class="bi bi-house-door me-2"></i>Back to Home
        </a>
        <a href="mailto:support@emaarpropertiesassets.com" class="btn-support">
            <i class="bi bi-headset me-2"></i>Contact Support
        </a>
    </div>

    <p class="footer-note">
        <i class="bi bi-info-circle"></i> Need help? Our support team is here to assist you
    </p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
