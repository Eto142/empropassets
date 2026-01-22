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
            padding: 15px 20px;
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

        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 5px;
        }

        .mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background-color: #333;
            border-radius: 2px;
            transition: all 0.3s;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: #fff;
            z-index: 1000;
            padding: 20px;
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .mobile-menu-links {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .mobile-menu-links a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .mobile-menu-links a.active {
            color: #2563eb;
        }

        /* Main Container */
        .dashboard-container {
            display: grid;
            grid-template-columns: 320px 1fr 300px;
            gap: 30px;
            padding: 30px 20px;
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
            .dashboard-nav {
                padding: 12px 15px;
            }

            .nav-brand {
                font-size: 16px;
            }

            .nav-brand-logo {
                width: 32px;
                height: 32px;
                font-size: 16px;
            }

            .dashboard-container {
                grid-template-columns: 1fr;
                padding: 20px 15px;
                gap: 20px;
            }

            .sidebar-left {
                display: none;
            }

            .nav-links {
                display: none;
            }

            .mobile-menu-toggle {
                display: flex;
            }

            .properties-grid {
                grid-template-columns: 1fr;
            }

            .filter-section {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                padding: 15px;
            }

            .main-content {
                padding: 20px;
            }

            .section-title {
                font-size: 24px;
            }

            .browse-section {
                padding: 20px;
            }

            .progress-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .status-steps {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 20px;
            }

            .progress-indicator {
                width: 40px;
                height: 40px;
                font-size: 24px;
            }

            .progress-text {
                font-size: 18px;
            }

            .property-name {
                font-size: 18px;
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
            <a href="{{ route('invest') }}">INVEST</a>
            <a href="{{ route('portfolio') }}" class="active">PORTFOLIO</a>
            <a href="#">ABOUT</a>
            <a href="#">LEARN</a>
        </div>
        <div class="nav-right">
            <div class="user-menu">
                <span>{{ strtoupper(auth()->user()->name ?? 'USER') }}</span>
                <span>▼</span>
            </div>
            <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <div class="nav-brand">
                <div class="nav-brand-logo">A</div>
                <span>EMAAR Properties Assets</span>
            </div>
            <button onclick="toggleMobileMenu()" style="background: none; border: none; font-size: 24px; cursor: pointer;">×</button>
        </div>
        <div class="mobile-menu-links">
            <a href="{{ route('invest') }}">INVEST</a>
            <a href="{{ route('portfolio') }}" class="active">PORTFOLIO</a>
            <a href="#">ABOUT</a>
            <a href="#">LEARN</a>
        </div>
    </div>

    <!-- Main Dashboard -->
    <div class="dashboard-container">
        <!-- Left Sidebar -->
        <div class="sidebar-left">
            <div class="portfolio-card">
                <div class="portfolio-header">
                    <span>Portfolio</span>
                    <span>›</span>
                </div>
                <div class="balance-item">
                    <div class="balance-label">
                        Total Account Balance
                        <div class="info-icon">i</div>
                    </div>
                    <span>—</span>
                </div>
                <div class="balance-item">
                    <div class="balance-label">
                        EMAAR Properties Assets Cash Balance
                        <div class="info-icon">i</div>
                    </div>
                    <span class="balance-value">$0.00</span>
                </div>
                <div class="portfolio-footer">
                    Finish the signup process to access your Investment Account. Once you have made investments, this is where your dividends will be deposited.
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="section-header">
                <div class="section-title">Portfolio</div>
            </div>

            <div class="tabs">
                <div class="tab active">Overview</div>
                <div class="tab">Activity</div>
            </div>

            <div class="investments-container">
                <div class="investments-title">Your Investments (0)</div>
                <div class="map-placeholder">
                    <img src="/images/us-map.jpg" alt="US Map" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="sidebar-right">
            <div class="returns-card">
                <div class="returns-title">Your Returns</div>

                <div class="return-item">
                    <div>
                        <div class="return-amount">$0.00</div>
                        <div class="return-label">Total Dividends</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="return-arrow">›</div>
                </div>

                <div class="return-item">
                    <div>
                        <div class="return-amount">0.00%</div>
                        <div class="return-label">Annualized Dividend Yield</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="return-arrow">›</div>
                </div>

                <div class="return-item">
                    <div>
                        <div class="return-amount">$0.00</div>
                        <div class="return-label">Current Net Returns</div>
                        <div class="progress-line"></div>
                    </div>
                    <div class="return-arrow">›</div>
                </div>
            </div>

            <div class="returns-card">
                <div class="returns-title">Upcoming Events</div>
                <div style="font-size: 13px; color: #999;">No upcoming events</div>
            </div>
        </div>
    </div>

    <!-- Browse Section -->
    <div style="max-width: 1600px; margin: 0 auto; padding: 30px;">
        <div class="browse-section">
            <div class="progress-header">
                <div class="progress-indicator">⏳</div>
                <div class="progress-text">Halfway ready to invest</div>
            </div>

            <div class="status-steps">
                <div class="status-step completed">
                    <span class="checkmark">✓</span>
                    Verify your email address
                </div>
                <div class="status-step completed">
                    <span class="checkmark">✓</span>
                    Create an investment account
                </div>
                <div class="status-step pending">
                    <span class="checkmark">→</span>
                    Link your bank account
                </div>
                <div class="status-step future">
                    <span class="checkmark">⏳</span>
                    Identity verification
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-button active">All</div>
                <div class="filter-button">Single Family Residential</div>
                <div class="filter-button">Vacation Rental</div>
                <div class="filter-button">Funds</div>
                <div class="filter-button">Real Estate Debt</div>
                <div style="margin-left: auto;">
                    <span class="filter-label">FILTER</span>
                </div>
            </div>

            <div class="properties-grid">
                <div class="property-card">
                    <div class="property-image">
                        <img src="/images/brick-house.jpg" alt="Private Credit Fund">
                    </div>
                    <div class="property-info">
                        <div class="property-type">Real Estate Debt, Fund</div>
                        <div class="property-name">Private Credit Fund</div>
                        <div class="property-detail">8.3% Historic Yield <span style="color: #999;">|</span> $73M Total Net Assets</div>
                        <div class="status-badge">Available</div>
                    </div>
                </div>

                <div class="property-card">
                    <div class="property-image">
                        <img src="/images/hero-property.jpg" alt="The William">
                    </div>
                    <div class="property-info">
                        <div class="property-type">Single Family Residential</div>
                        <div class="property-name">The William</div>
                        <div class="property-detail">Indianapolis, IN</div>
                        <div class="property-stats">
                            <div class="stat">
                                <div class="stat-label">Status</div>
                                <div class="stat-value">Leased</div>
                            </div>
                            <div class="stat">
                                <div class="stat-label">Investors</div>
                                <div class="stat-value">772</div>
                            </div>
                            <div class="stat">
                                <div class="stat-label">Max</div>
                                <div class="stat-value">$10K</div>
                            </div>
                        </div>
                        <div class="status-badge">Available</div>
                    </div>
                </div>

                <div class="property-card">
                    <div class="property-image">
                        <img src="/images/modern-house.jpg" alt="The Chesterfield">
                    </div>
                    <div class="property-info">
                        <div class="property-type">Single Family Residential</div>
                        <div class="property-name">The Chesterfield</div>
                        <div class="property-detail">Richmond, VA</div>
                        <div class="property-stats">
                            <div class="stat">
                                <div class="stat-label">Status</div>
                                <div class="stat-value">Leased</div>
                            </div>
                            <div class="stat">
                                <div class="stat-label">Investors</div>
                                <div class="stat-value">812</div>
                            </div>
                        </div>
                        <div class="status-badge">New</div>
                    </div>
                </div>
            </div>

            <div class="pagination-container">
                <button class="pagination-button">‹</button>
                <button class="pagination-button active">1</button>
                <button class="pagination-button">2</button>
                <button class="pagination-button">3</button>
                <button class="pagination-button">4</button>
                <span class="pagination-dots">...</span>
                <button class="pagination-button">21</button>
                <button class="pagination-button">›</button>
            </div>
        </div>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const toggle = document.querySelector('.mobile-menu-toggle');
            if (menu && !menu.contains(event.target) && !toggle.contains(event.target)) {
                menu.classList.remove('active');
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
