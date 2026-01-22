<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invest - EMAAR Properties Assets</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    @include('user.partials.navbar-styles')
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

        /* Main Container */
        .invest-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 900;
            color: #000;
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #666;
        }

        /* Progress Section */
        .progress-section {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 40px;
            border: 1px solid #e5e7eb;
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
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .filter-button {
            padding: 10px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 25px;
            background-color: #fff;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: #666;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .filter-button.active {
            border-color: #2563eb;
            color: #2563eb;
            background-color: #eff6ff;
        }

        .filter-button:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        .filter-label {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            color: #666;
            margin-left: auto;
        }

        /* Property Cards */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .property-card {
            background-color: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .property-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .property-image {
            width: 100%;
            height: 240px;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .property-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .property-info {
            padding: 25px;
        }

        .property-type {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .property-name {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #000;
        }

        .property-detail {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .property-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
        }

        .stat {
            font-size: 13px;
        }

        .stat-label {
            color: #999;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-weight: 700;
            color: #000;
            margin-top: 6px;
            font-size: 16px;
        }

        .invest-button {
            width: 100%;
            margin-top: 20px;
            padding: 14px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .invest-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .pagination-button {
            min-width: 44px;
            height: 44px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background-color: #fff;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: #666;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-button.active {
            background-color: #2563eb;
            color: #fff;
            border-color: #2563eb;
        }

        .pagination-button:hover:not(.active) {
            border-color: #2563eb;
            color: #2563eb;
        }

        .pagination-dots {
            color: #999;
            font-weight: 600;
            padding: 0 5px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .properties-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .dashboard-nav {
                padding: 12px 15px;
            }

            .nav-links {
                display: none;
            }

            .mobile-menu-toggle {
                display: flex;
            }

            .nav-brand {
                font-size: 16px;
            }

            .nav-brand-logo {
                width: 32px;
                height: 32px;
                font-size: 16px;
            }

            .invest-container {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 28px;
            }

            .page-subtitle {
                font-size: 14px;
            }

            .progress-section {
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

            .filter-section {
                padding: 15px;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .filter-label {
                margin-left: 0;
                margin-top: 10px;
            }

            .properties-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .property-image {
                height: 200px;
            }

            .property-info {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 24px;
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
                font-size: 20px;
            }

            .pagination-button {
                min-width: 40px;
                height: 40px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    @include('user.partials.navbar')

    <!-- Main Content -->
    <div class="invest-container">
        <div class="page-header">
            <h1 class="page-title">Browse Available Properties</h1>
            <p class="page-subtitle">Invest in real estate with as little as $100. Build your portfolio one property at a time.</p>
        </div>

        <!-- Progress Section -->
        <div class="progress-section">
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
        </div>

        <!-- Filters -->
        <div class="filter-section">
            <div class="filter-button active">All</div>
            <div class="filter-button">Single Family Residential</div>
            <div class="filter-button">Vacation Rental</div>
            <div class="filter-button">Funds</div>
            <div class="filter-button">Real Estate Debt</div>
            <div class="filter-label">FILTER</div>
        </div>

        <!-- Properties Grid -->
        <div class="properties-grid">
            <div class="property-card">
                <div class="property-image">
                    <img src="/images/brick-house.jpg" alt="Private Credit Fund">
                    <div class="property-badge">Available</div>
                </div>
                <div class="property-info">
                    <div class="property-type">Real Estate Debt, Fund</div>
                    <div class="property-name">Private Credit Fund</div>
                    <div class="property-detail">8.3% Historic Yield <span style="color: #999;">|</span> $73M Total Net Assets</div>
                    <div class="property-stats">
                        <div class="stat">
                            <div class="stat-label">Min Investment</div>
                            <div class="stat-value">$100</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Investors</div>
                            <div class="stat-value">1,277</div>
                        </div>
                    </div>
                    <button class="invest-button">Invest Now</button>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image">
                    <img src="/images/hero-property.jpg" alt="The William">
                    <div class="property-badge">Available</div>
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
                            <div class="stat-label">Max Investment</div>
                            <div class="stat-value">$10K</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Yield</div>
                            <div class="stat-value">6.2%</div>
                        </div>
                    </div>
                    <button class="invest-button">Invest Now</button>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image">
                    <img src="/images/modern-house.jpg" alt="The Chesterfield">
                    <div class="property-badge">New</div>
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
                        <div class="stat">
                            <div class="stat-label">Max Investment</div>
                            <div class="stat-value">$10K</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Yield</div>
                            <div class="stat-value">5.8%</div>
                        </div>
                    </div>
                    <button class="invest-button">Invest Now</button>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image">
                    <img src="/images/dark-blue-house.jpg" alt="The Madison">
                    <div class="property-badge">Available</div>
                </div>
                <div class="property-info">
                    <div class="property-type">Single Family Residential</div>
                    <div class="property-name">The Madison</div>
                    <div class="property-detail">Phoenix, AZ</div>
                    <div class="property-stats">
                        <div class="stat">
                            <div class="stat-label">Status</div>
                            <div class="stat-value">Leased</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Investors</div>
                            <div class="stat-value">654</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Max Investment</div>
                            <div class="stat-value">$10K</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Yield</div>
                            <div class="stat-value">6.5%</div>
                        </div>
                    </div>
                    <button class="invest-button">Invest Now</button>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image">
                    <img src="/images/hero-property.jpg" alt="The Riverside">
                    <div class="property-badge">Available</div>
                </div>
                <div class="property-info">
                    <div class="property-type">Vacation Rental</div>
                    <div class="property-name">The Riverside</div>
                    <div class="property-detail">Asheville, NC</div>
                    <div class="property-stats">
                        <div class="stat">
                            <div class="stat-label">Status</div>
                            <div class="stat-value">Active</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Investors</div>
                            <div class="stat-value">923</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Max Investment</div>
                            <div class="stat-value">$10K</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Yield</div>
                            <div class="stat-value">7.2%</div>
                        </div>
                    </div>
                    <button class="invest-button">Invest Now</button>
                </div>
            </div>

            <div class="property-card">
                <div class="property-image">
                    <img src="/images/brick-house.jpg" alt="The Summit">
                    <div class="property-badge">Available</div>
                </div>
                <div class="property-info">
                    <div class="property-type">Single Family Residential</div>
                    <div class="property-name">The Summit</div>
                    <div class="property-detail">Denver, CO</div>
                    <div class="property-stats">
                        <div class="stat">
                            <div class="stat-label">Status</div>
                            <div class="stat-value">Leased</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Investors</div>
                            <div class="stat-value">1,045</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Max Investment</div>
                            <div class="stat-value">$10K</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Yield</div>
                            <div class="stat-value">6.0%</div>
                        </div>
                    </div>
                    <button class="invest-button">Invest Now</button>
                </div>
            </div>
        </div>

        <!-- Pagination -->
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

    <script>
        // Navigation functions are handled in navbar-styles.blade.php
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

