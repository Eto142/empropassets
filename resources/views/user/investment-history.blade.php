<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment History - EMAAR Properties Assets</title>
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

        .history-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 900;
            color: #000;
            margin-bottom: 10px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #666;
        }

        .history-card {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .filter-tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 0;
        }

        .filter-tab {
            padding: 12px 20px;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            transition: all 0.2s;
        }

        .filter-tab:hover {
            color: #2563eb;
        }

        .filter-tab.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-table thead {
            background-color: #f9fafb;
        }

        .history-table th {
            padding: 15px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e5e7eb;
        }

        .history-table td {
            padding: 20px 15px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        .history-table tbody tr:hover {
            background-color: #f9fafb;
        }

        .investment-name {
            font-weight: 700;
            color: #000;
            margin-bottom: 5px;
        }

        .investment-type {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
        }

        .amount {
            font-weight: 700;
            color: #000;
            font-size: 16px;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-active {
            background-color: #d1fae5;
            color: #047857;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background-color: #dbeafe;
            color: #1e40af;
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #1E40AF 0%, #2563eb 100%);
            border-radius: 12px;
            padding: 20px;
            color: #fff;
        }

        .stat-label {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 900;
        }

        @media (max-width: 768px) {
            .history-container {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 24px;
            }

            .history-card {
                padding: 20px;
                overflow-x: auto;
            }

            .history-table {
                min-width: 600px;
            }

            .filter-tabs {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .filter-tab {
                white-space: nowrap;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('user.partials.navbar')

    <div class="history-container">
        <div class="page-header">
            <h1 class="page-title">Investment History</h1>
            <p class="page-subtitle">View all your investment transactions and activity</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Investments</div>
                <div class="stat-value">$0.00</div>
            </div>
            <div class="stat-card" style="background: linear-gradient(135deg, #059669 0%, #10b981 100%);">
                <div class="stat-label">Total Returns</div>
                <div class="stat-value">$0.00</div>
            </div>
            <div class="stat-card" style="background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 100%);">
                <div class="stat-label">Active Investments</div>
                <div class="stat-value">0</div>
            </div>
        </div>

        <div class="history-card">
            <div class="filter-tabs">
                <div class="filter-tab active">All</div>
                <div class="filter-tab">Investments</div>
                <div class="filter-tab">Dividends</div>
                <div class="filter-tab">Withdrawals</div>
                <div class="filter-tab">Deposits</div>
            </div>

            <div style="overflow-x: auto;">
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Transaction</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <div class="empty-state-icon">📊</div>
                                    <div class="empty-state-title">No transactions yet</div>
                                    <div class="empty-state-text">Your investment history will appear here once you start investing.</div>
                                    <a href="{{ route('invest') }}" class="empty-state-button">Start Investing</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Filter tab switching
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                // Here you would filter the table based on the selected tab
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>



