<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMAAR Properties Assets - Real Estate Investment Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }

        /* Header Banner */
        .header-banner {
            background-color: #000;
            color: #fff;
            padding: 15px 0;
            font-size: 14px;
        }

        .header-banner a {
            color: #fff;
            text-decoration: underline;
        }

        /* Navigation */
        .navbar-custom {
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb !important;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            font-size: 14px;
            margin: 0 15px;
        }

        .nav-link:hover {
            color: #666 !important;
        }

        .btn-signup {
            background-color: #000;
            color: #fff;
            padding: 8px 24px;
            border-radius: 6px;
            border: none;
            font-weight: 600;
            font-size: 13px;
        }

        .btn-signup:hover {
            background-color: #333;
            color: #fff;
        }

        /* Hero Section */
        .hero-section {
            padding: 60px 0;
        }

        .hero-title {
            font-size: 56px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 25px;
        }

        .hero-subtitle {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn-primary-large {
            background-color: #2563eb;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary-large:hover {
            background-color: #1d4ed8;
        }

        /* Property Grid */
        .property-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .property-card {
            border-radius: 12px;
            overflow: hidden;
            height: 160px;
            position: relative;
        }

        .property-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .investor-badge {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-top-right {
            top: 12px;
            right: 12px;
        }

        .badge-bottom-right {
            bottom: 12px;
            right: 12px;
        }

        /* Returns Section */
        .returns-section {
            padding: 80px 0;
            border-top: 1px solid #e5e7eb;
        }

        .returns-title {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .returns-subtitle {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .carousel-buttons {
            display: flex;
            gap: 10px;
        }

        .carousel-btn {
            width: 48px;
            height: 48px;
            border: 2px solid #ccc;
            background-color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        .carousel-btn:hover {
            background-color: #f3f4f6;
        }

        /* Large Image Grid */
        .image-grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin: 40px 0;
        }

        .image-card {
            border-radius: 16px;
            overflow: hidden;
            height: 300px;
        }

        .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 50px;
            padding: 50px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .stat-item h3 {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .stat-item p {
            color: #666;
            font-size: 15px;
        }

        /* Investment Properties */
        .investment-properties {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            padding: 50px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .property-item h4 {
            font-size: 12px;
            font-weight: 900;
            color: #666;
            margin-bottom: 8px;
        }

        .property-item p {
            font-size: 14px;
            font-weight: bold;
            color: #2563eb;
        }

        /* Testimonial Section */
        .testimonial-section {
            background-color: #eff6ff;
            padding: 80px 0;
        }

        .testimonial-quote {
            font-size: 32px;
            font-weight: 300;
            color: #1f2937;
            margin-bottom: 50px;
            line-height: 1.6;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .media-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .media-logo {
            font-weight: bold;
            color: #60a5fa;
            font-size: 14px;
        }

        /* Team Section */
        .team-section {
            padding: 80px 0;
        }

        .team-image {
            border-radius: 16px;
            overflow: hidden;
            height: 400px;
            position: relative;
        }

        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .play-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .team-image:hover .play-overlay {
            opacity: 1;
        }

        .play-button {
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
        }

        .team-content h2 {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .team-content p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .company-origin {
            margin-bottom: 30px;
        }

        .company-origin-label {
            font-size: 12px;
            font-weight: bold;
            color: #999;
            margin-bottom: 15px;
        }

        .company-list {
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .company-list span {
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }

        /* Portfolio Section */
        .portfolio-section {
            background-color: #f9fafb;
            padding: 80px 0;
        }

        .portfolio-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 40px;
            margin-bottom: 40px;
        }

        .portfolio-title {
            font-size: 48px;
            font-weight: 900;
            line-height: 1.2;
            max-width: 600px;
        }

        .btn-browse {
            background-color: #000;
            color: #fff;
            padding: 15px 25px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 13px;
            white-space: nowrap;
        }

        .btn-browse:hover {
            background-color: #333;
        }

        .map-container {
            width: 100%;
            height: 400px;
            background-color: #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .map-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Footer Section */
        .footer-cta {
            padding: 50px 0;
            border-top: 1px solid #e5e7eb;
            text-align: center;
        }

        .btn-cta {
            background-color: #2563eb;
            color: #fff;
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 15px;
        }

        .btn-cta:hover {
            background-color: #1d4ed8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }

            .returns-title {
                font-size: 32px;
            }

            .portfolio-title {
                font-size: 32px;
            }

            .hero-section {
                padding: 40px 0;
            }

            .returns-section {
                padding: 50px 0;
            }

            .portfolio-section {
                padding: 50px 0;
            }

            .team-section {
                padding: 50px 0;
            }

            .portfolio-header {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-browse {
                width: 100%;
                text-align: center;
            }

            .testimonial-quote {
                font-size: 24px;
            }

            .team-content h2 {
                font-size: 32px;
            }

            .stat-item h3 {
                font-size: 32px;
            }
        }

        /* EARN Section */
        .earn-section {
            background-color: #FCD34D;
            padding: 80px 0;
        }

        .section-label {
            display: inline-block;
            color: #666;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 48px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .section-description {
            font-size: 16px;
            color: #333;
            line-height: 1.7;
        }

        .dividend-card {
            background-color: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .dividend-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 16px;
            font-weight: 500;
            color: #666;
        }

        .dividend-amount {
            font-size: 48px;
            font-weight: 900;
            color: #000;
            margin-bottom: 5px;
        }

        .dividend-label {
            font-size: 14px;
            color: #999;
            margin-bottom: 30px;
        }

        .dividend-chart {
            margin: 30px 0;
            height: 80px;
        }

        .chart-svg {
            width: 100%;
            height: 100%;
        }

        .dividend-bottom {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
        }

        .bottom-amount {
            font-size: 32px;
            font-weight: 900;
            color: #000;
        }

        .bottom-label {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }

        .bottom-date {
            font-size: 16px;
            font-weight: 600;
            color: #000;
        }

        /* Browse Section */
        .browse-section {
            padding: 80px 0;
            background-color: #fff;
        }

        .browse-subtitle {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .blue-banner {
            background: linear-gradient(135deg, #1E40AF 0%, #2563eb 100%);
            border-radius: 20px;
            padding: 30px;
            margin-top: 40px;
        }

        .property-card-blue {
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            height: 250px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .property-card-blue img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Mobile CTA Banner */
        .mobile-cta-section {
            padding: 40px 0;
        }

        .mobile-banner {
            background: linear-gradient(135deg, #2563eb 0%, #1E40AF 100%);
            border-radius: 20px;
            padding: 60px 40px;
            color: #fff;
        }

        .mobile-banner-title {
            font-size: 40px;
            font-weight: 900;
            line-height: 1.3;
        }

        .btn-browse-white {
            background-color: #fff;
            color: #2563eb;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-browse-white:hover {
            background-color: #f0f0f0;
        }

        /* Mobile App Section */
        .mobile-app-section {
            padding: 80px 0;
            background-color: #f9f9f9;
        }

        .phone-mockup {
            text-align: center;
        }

        .phone-frame {
            background-color: #2c3e50;
            border-radius: 30px;
            padding: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 300px;
            margin: 0 auto;
        }

        .phone-frame img {
            border-radius: 25px;
            width: 100%;
            display: block;
        }

        .section-title-with-icon {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-title-with-icon h2 {
            font-size: 48px;
            font-weight: 900;
            line-height: 1.2;
            margin: 0;
        }

        .blue-icon {
            background-color: #2563eb;
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 900;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background-color: #fff;
        }

        .faq-title {
            font-size: 44px;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .faq-subtitle {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
        }

        .accordion-button {
            font-size: 16px;
            font-weight: 600;
            color: #000 !important;
            background-color: #fff !important;
            border: 1px solid #e5e7eb !important;
            padding: 15px 20px;
        }

        .accordion-button:not(.collapsed) {
            background-color: #f9f9f9 !important;
            color: #2563eb !important;
        }

        .accordion-item {
            border: 1px solid #e5e7eb;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .accordion-body {
            padding: 15px 20px;
            color: #666;
            font-size: 15px;
            line-height: 1.6;
        }

        /* SELL Section */
        .sell-section {
            padding: 80px 0;
            background-color: #6366f1;
        }

        .sell-section .section-label {
            color: #ccc;
        }

        .sell-section .section-title {
            color: #fff;
        }

        .sell-section .section-description {
            color: #ccc;
            font-size: 18px;
        }

        .sell-transactions {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .transaction-card {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .transaction-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .transaction-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .transaction-info {
            flex: 1;
        }

        .transaction-title {
            font-size: 15px;
            font-weight: 600;
            color: #000;
            margin-bottom: 5px;
        }

        .transaction-detail {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        /* Footer Section */
        .footer-section {
            background-color: #f5f5f5;
            padding: 60px 0;
            border-top: 1px solid #ddd;
        }

        .footer-title {
            font-size: 24px;
            font-weight: 900;
            margin-bottom: 15px;
        }

        .footer-subtitle {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .email-form {
            display: flex;
            gap: 10px;
        }

        .email-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-get-started {
            background-color: #000;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-get-started:hover {
            background-color: #333;
        }

        .footer-column-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links a:hover {
            color: #2563eb;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #ddd;
            color: #999;
            font-size: 13px;
        }

        /* Extended Responsive */
        @media (max-width: 768px) {
            .section-title,
            .faq-title {
                font-size: 32px;
            }

            .mobile-banner-title {
                font-size: 28px;
            }

            .section-title-with-icon {
                flex-direction: column;
                align-items: flex-start;
            }

            .section-title-with-icon h2 {
                font-size: 36px;
            }

            .email-form {
                flex-direction: column;
            }

            .dividend-card {
                margin-top: 30px;
            }

            .blue-banner {
                margin-top: 30px;
            }

            .transaction-card {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Banner -->
    {{-- <div class="header-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-1 text-center">
                    <div style="width: 32px; height: 32px; background-color: #666; border-radius: 50%; margin: 0 auto;"></div>
                </div>
                <div class="col-md-10">
                    <span>EMAAR Properties Assets has secured $27 million in new funding! <a href="#">Read how this milestone will continue to help us build the future</a> 🚀</span>
                </div>
                <div class="col-md-1 text-end">
                    <button style="background: none; border: none; color: #fff; cursor: pointer; font-size: 20px;">✕</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">EMAAR Properties Assets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('invest.public') }}">INVEST</a>
                    <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
                    <a class="nav-link" href="{{ route('learn') }}">LEARN</a>
                    <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
                    <a class="btn-signup" href="{{ route('show.register') }}">REGISTER</a>
                </div>
            </div>
        </div>
    </nav>