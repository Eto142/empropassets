<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - EMAAR Properties Assets</title>
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

        /* Account Details Section at Top */
        .account-details-section {
            max-width: 1600px;
            margin: 0 auto;
            padding: 24px 20px 0;
        }

        .account-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .account-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .account-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: #d1d5db;
        }

        .account-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
        }

        .account-card-title {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .account-card-value {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin: 0;
            line-height: 1.2;
        }

        .account-card-change {
            font-size: 11px;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 8px;
        }

        .account-card-change.positive {
            color: #059669;
        }

        .account-card-change.negative {
            color: #dc2626;
        }

        .account-card-footer {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #f3f4f6;
            font-size: 11px;
            color: #9ca3af;
            line-height: 1.4;
        }

        .account-card-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .account-card-icon.blue {
            background-color: #eff6ff;
            color: #2563eb;
        }

        .account-card-icon.green {
            background-color: #f0fdf4;
            color: #16a34a;
        }

        .account-card-icon.purple {
            background-color: #faf5ff;
            color: #9333ea;
        }

        .account-card-icon.red {
            background-color: #fef2f2;
            color: #dc2626;
        }

        /* Main Container */
        .portfolio-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 30px 20px;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
        }

        /* Main Content */
        .main-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 24px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -0.02em;
        }

        .tabs {
            display: flex;
            gap: 24px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 24px;
        }

        .tab {
            padding: 12px 0;
            border-bottom: 2px solid transparent;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.2s;
            margin-bottom: -1px;
        }

        .tab:hover {
            color: #2563eb;
        }

        .tab.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .investments-container {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .investments-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .map-placeholder {
            background: linear-gradient(135deg, #dbeafe 0%, #e0f2fe 100%);
            border-radius: 8px;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .map-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-state-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .empty-state-text {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .empty-state-button {
            padding: 12px 30px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .empty-state-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.2s;
        }

        .activity-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .activity-info {
            flex: 1;
        }

        .activity-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #000;
        }

        .activity-date {
            font-size: 13px;
            color: #666;
        }

        .activity-amount {
            font-size: 18px;
            font-weight: 700;
            color: #000;
        }

        /* Right Sidebar */
        .sidebar-right {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .returns-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .returns-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #111827;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .return-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: all 0.2s;
        }

        .return-item:hover {
            padding-left: 5px;
        }

        .return-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .return-amount {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
        }

        .return-label {
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }

        .return-arrow {
            color: #2563eb;
            font-size: 20px;
        }

        .progress-line {
            height: 3px;
            background: linear-gradient(90deg, #2563eb 0%, #60a5fa 100%);
            margin-top: 10px;
            border-radius: 2px;
        }

        .events-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .event-item {
            padding: 15px;
            background-color: #f9fafb;
            border-radius: 8px;
            border-left: 3px solid #2563eb;
        }

        .event-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #000;
        }

        .event-date {
            font-size: 12px;
            color: #666;
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .quick-action-btn {
            flex: 1;
            padding: 12px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
        }

        .quick-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .quick-action-btn.secondary {
            background: #f3f4f6;
            color: #333;
        }

        .quick-action-btn.secondary:hover {
            background: #e5e7eb;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .portfolio-container {
                grid-template-columns: 1fr;
            }

            .sidebar-right {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .account-details-section {
                padding: 20px 15px 0;
            }

            .account-cards-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .account-card-value {
                font-size: 28px;
            }

            .portfolio-container {
                padding: 20px 15px;
                gap: 20px;
            }

            .main-content {
                padding: 20px;
            }

            .section-title {
                font-size: 24px;
            }

            .tabs {
                gap: 20px;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .tab {
                white-space: nowrap;
                font-size: 13px;
            }

            .map-placeholder {
                height: 250px;
            }

            .activity-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .activity-amount {
                align-self: flex-end;
            }

            .quick-actions {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 20px;
            }

            .account-card {
                padding: 20px;
            }

            .account-card-value {
                font-size: 24px;
            }

            .return-amount {
                font-size: 24px;
            }

            .empty-state-icon {
                font-size: 48px;
            }

            .empty-state-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    @include('user.partials.navbar')

    <!-- Account Details Section at Top -->
    <div class="account-details-section">
        <div class="account-cards-grid">
            <div class="account-card">
                <div class="account-card-header">
                    <div style="flex: 1;">
                        <div class="account-card-title">Total Account Balance</div>
                        <div class="account-card-value">$0.00</div>
                    </div>
                    <div class="account-card-icon blue">$</div>
                </div>
                <div class="account-card-change">
                    <span>No change</span>
                </div>
                <div class="account-card-footer">
                    Total account value including investments and cash
                </div>
            </div>

            <div class="account-card">
                <div class="account-card-header">
                    <div style="flex: 1;">
                        <div class="account-card-title">Cash Balance</div>
                        <div class="account-card-value">$0.00</div>
                    </div>
                    <div class="account-card-icon green">💵</div>
                </div>
                <div class="account-card-change positive">
                    <span>Available</span>
                </div>
                <div class="account-card-footer">
                    Available cash for new investments or withdrawals
                </div>
            </div>

            <div class="account-card">
                <div class="account-card-header">
                    <div style="flex: 1;">
                        <div class="account-card-title">Total Invested</div>
                        <div class="account-card-value">$0.00</div>
                    </div>
                    <div class="account-card-icon purple">🏠</div>
                </div>
                <div class="account-card-change">
                    <span>0 properties</span>
                </div>
                <div class="account-card-footer">
                    Total amount invested across all properties
                </div>
            </div>

            <div class="account-card">
                <div class="account-card-header">
                    <div style="flex: 1;">
                        <div class="account-card-title">Total Returns</div>
                        <div class="account-card-value">$0.00</div>
                    </div>
                    <div class="account-card-icon red">📈</div>
                </div>
                <div class="account-card-change">
                    <span>0.00% yield</span>
                </div>
                <div class="account-card-footer">
                    Total dividends and returns earned
                </div>
            </div>
        </div>
    </div>

    <!-- Main Dashboard -->
    <div class="portfolio-container">
        <!-- Main Content -->
        <div class="main-content">
            <div class="section-header">
                <div class="section-title">Portfolio Overview</div>
            </div>

            <div class="tabs">
                <div class="tab active">Overview</div>
                <div class="tab">Activity</div>
            </div>

            <div class="investments-container">
                <div class="investments-title">Your Investments (0)</div>
                <div class="map-placeholder">
                    <img src="/images/us-map.jpg" alt="US Map">
                </div>
            </div>

            <div class="empty-state">
                <div class="empty-state-icon">📊</div>
                <div class="empty-state-title">No investments yet</div>
                <div class="empty-state-text">Start building your real estate portfolio by investing in your first property.</div>
                <div class="quick-actions">
                    <a href="{{ route('invest') }}" class="quick-action-btn">Browse Properties</a>
                    <a href="{{ route('deposit.form') }}" class="quick-action-btn secondary">Add Funds</a>
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
                <div class="events-list">
                    <div class="event-item">
                        <div class="event-title">No upcoming events</div>
                        <div class="event-date">Check back later for dividend distributions and property updates</div>
                    </div>
                </div>
            </div>

            <div class="returns-card">
                <div class="returns-title">Quick Actions</div>
                <div class="quick-actions">
                    <a href="{{ route('deposit.form') }}" class="quick-action-btn">Deposit</a>
                    <a href="{{ route('withdrawal') }}" class="quick-action-btn secondary">Withdraw</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
