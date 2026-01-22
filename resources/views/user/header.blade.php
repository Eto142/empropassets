<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EMAAR Properties Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Top Navigation */
        .dashboard-nav {
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 20px;
            font-weight: 700;
            color: #000;
        }

        .nav-brand-logo {
            width: 40px;
            height: 40px;
            background-color: #2563eb;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 900;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
            flex: 1;
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #666;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .nav-links a.active {
            color: #2563eb;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background-color: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
        }

        /* Main Container */
        .dashboard-container {
            display: grid;
            grid-template-columns: 320px 1fr 300px;
            gap: 30px;
            padding: 30px;
            max-width: 1600px;
            margin: 0 auto;
        }

        /* Sidebar Left */
        .sidebar-left {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .portfolio-card {
            background: linear-gradient(135deg, #1E40AF 0%, #2563eb 100%);
            border-radius: 16px;
            padding: 25px;
            color: #fff;
        }

        .portfolio-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 18px;
            font-weight: 700;
        }

        .portfolio-header span:last-child {
            font-size: 20px;
        }

        .balance-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dotted rgba(255, 255, 255, 0.3);
            font-size: 14px;
        }

        .balance-item:last-child {
            border-bottom: none;
        }

        .balance-label {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .balance-value {
            font-weight: 600;
            font-size: 16px;
        }

        .info-icon {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            cursor: help;
        }

        .portfolio-footer {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Main Content */
        .main-content {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: #000;
        }

        .tabs {
            display: flex;
            gap: 30px;
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 30px;
        }

        .tab {
            padding: 15px 0;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
        }

        .tab.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .investments-container {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .investments-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .map-placeholder {
            background: linear-gradient(135deg, #dbeafe 0%, #e0f2fe 100%);
            border-radius: 8px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 14px;
        }

        /* Sidebar Right */
        .sidebar-right {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .returns-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
        }

        .returns-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #000;
        }

        .return-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
        }

        .return-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .return-amount {
            font-size: 24px;
            font-weight: 900;
            color: #000;
        }

        .return-label {
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }

        .return-arrow {
            color: #2563eb;
            font-size: 20px;
            cursor: pointer;
        }

        .progress-line {
            height: 3px;
            background: linear-gradient(90deg, #2563eb 0%, #60a5fa 100%);
            margin-top: 10px;
            border-radius: 2px;
        }

        /* Browse Section */
        .browse-section {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            margin-top: 30px;
        }

        .progress-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .progress-indicator {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #06b6d4 0%, #00d9ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #fff;
            font-weight: 900;
        }

        .progress-text {
            font-size: 20px;
            font-weight: 700;
            color: #000;
        }

        .status-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .status-step {
            padding: 15px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-step.completed {
            background-color: #d1fae5;
            color: #047857;
        }

        .status-step.pending {
            background-color: #f3f4f6;
            color: #666;
        }

        .status-step.future {
            background-color: #fef3c7;
            color: #92400e;
        }

        .checkmark {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.1);
            font-size: 12px;
        }

        /* Filters */
        .filter-section {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-button {
            padding: 8px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            background-color: #fff;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: #666;
            transition: all 0.2s;
        }

        .filter-button.active {
            border-color: #2563eb;
            color: #2563eb;
            background-color: #f0f9ff;
        }

        .filter-button:hover {
            border-color: #2563eb;
        }

        .filter-label {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            color: #666;
        }

        /* Property Cards */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .property-card {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .property-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .property-image {
            width: 100%;
            height: 200px;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .property-info {
            padding: 20px;
        }

        .property-type {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .property-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #000;
        }

        .property-detail {
            font-size: 13px;
            color: #666;
            margin-bottom: 3px;
        }

        .property-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .stat {
            font-size: 12px;
        }

        .stat-label {
            color: #999;
            font-weight: 500;
        }

        .stat-value {
            font-weight: 700;
            color: #000;
            margin-top: 4px;
        }

        .status-badge {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 30px;
        }

        .pagination-button {
            width: 40px;
            height: 40px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: #fff;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: #666;
            transition: all 0.2s;
        }

        .pagination-button.active {
            background-color: #4b5563;
            color: #fff;
            border-color: #4b5563;
        }

        .pagination-button:hover:not(.active) {
            border-color: #2563eb;
            color: #2563eb;
        }

        .pagination-dots {
            color: #999;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-container {
                grid-template-columns: 280px 1fr;
            }

            .sidebar-right {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar-left {
                display: none;
            }

            .nav-links {
                display: none;
            }

            .properties-grid {
                grid-template-columns: 1fr;
            }

            .filter-section {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <div class="dashboard-nav">
        <div class="nav-brand">
            <div class="nav-brand-logo">A</div>
            <span>EMAAR Properties Assets</span>
        </div>
        <div class="nav-links">
            <a href="#">INVEST</a>
            <a href="#" class="active">PORTFOLIO</a>
            <a href="#">ABOUT</a>
            <a href="#">LEARN</a>
        </div>
        <div class="nav-right">
            <div class="user-menu">
                <span>JESSICA</span>
                <span>▼</span>
            </div>
        </div>
    </div>
