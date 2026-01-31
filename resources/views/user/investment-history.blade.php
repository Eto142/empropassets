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
                <div class="stat-label">Cash Balance</div>
                <div class="stat-value">${{ number_format($cash_balance, 2) }}</div>
            </div>
            <div class="stat-card" style="background: linear-gradient(135deg, #059669 0%, #10b981 100%);">
                <div class="stat-label">Total Invested</div>
                <div class="stat-value">${{ number_format($total_invested, 2) }}</div>
            </div>
            <div class="stat-card" style="background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 100%);">
                <div class="stat-label">Total Returns</div>
                <div class="stat-value">${{ number_format($total_returns, 2) }}</div>
            </div>
            <div class="stat-card" style="background: linear-gradient(135deg, #dc2626 0%, #f87171 100%);">
                <div class="stat-label">Total Balance</div>
                <div class="stat-value">${{ number_format($total_balance, 2) }}</div>
            </div>
        </div>

        <div class="history-card">
            <div class="filter-tabs">
                <div class="filter-tab active" data-filter="all">All Transactions</div>
                <div class="filter-tab" data-filter="deposit">💰 Deposits ({{ $deposits->count() }})</div>
                <div class="filter-tab" data-filter="investment">📈 Investments ({{ $investments->count() }})</div>
                <div class="filter-tab" data-filter="withdrawal">📤 Withdrawals ({{ $withdrawals->count() }})</div>
            </div>

            <div style="overflow-x: auto;">
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($allTransactions->count() > 0)
                            @foreach($allTransactions as $transaction)
                                <tr data-type="{{ $transaction['type'] }}">
                                    <td>{{ $transaction['date']->format('M d, Y H:i') }}</td>
                                    <td>
                                        <span style="font-size: 18px;">{{ $transaction['icon'] }}</span>
                                        <span style="margin-left: 8px; text-transform: uppercase; font-weight: 700; font-size: 12px;">{{ $transaction['type'] }}</span>
                                    </td>
                                    <td>{{ $transaction['description'] }}</td>
                                    <td>
                                        <span class="amount" style="color: {{ $transaction['amount'] < 0 ? '#dc2626' : '#10b981' }};">
                                            {{ $transaction['amount'] < 0 ? '-' : '+' }}${{ number_format(abs($transaction['amount']), 2) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($transaction['type'] === 'deposit' || $transaction['type'] === 'withdrawal')
                                            @if($transaction['status'] == 0)
                                                <span class="status-badge status-pending">Pending</span>
                                            @elseif($transaction['status'] == 1)
                                                <span class="status-badge status-active">Approved</span>
                                            @else
                                                <span class="status-badge" style="background-color: #fee2e2; color: #dc2626;">Rejected</span>
                                            @endif
                                        @else
                                            @if($transaction['status'] == 1)
                                                <span class="status-badge status-active">Active</span>
                                            @else
                                                <span class="status-badge status-pending">Pending</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-state-icon">📊</div>
                                        <div class="empty-state-title">No transactions yet</div>
                                        <div class="empty-state-text">Your transaction history will appear here once you start depositing and investing.</div>
                                        <a href="{{ route('deposit.form') }}" class="empty-state-button">Make Your First Deposit</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Empty states for each category -->
                @if($deposits->count() == 0)
                    <div id="empty-deposit" style="display: none;">
                        <table class="history-table">
                            <tbody>
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            <div class="empty-state-icon">💰</div>
                                            <div class="empty-state-title">No Deposits Yet</div>
                                            <div class="empty-state-text">You haven't made any deposits. Fund your account to start investing!</div>
                                            <a href="{{ route('deposit.form') }}" class="empty-state-button">Make Your First Deposit</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

                @if($investments->count() == 0)
                    <div id="empty-investment" style="display: none;">
                        <table class="history-table">
                            <tbody>
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            <div class="empty-state-icon">📈</div>
                                            <div class="empty-state-title">No Investments Yet</div>
                                            <div class="empty-state-text">You haven't made any investments yet. Start building your portfolio today!</div>
                                            <a href="{{ route('invest.index') }}" class="empty-state-button">Explore Investments</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

                @if($withdrawals->count() == 0)
                    <div id="empty-withdrawal" style="display: none;">
                        <table class="history-table">
                            <tbody>
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state">
                                            <div class="empty-state-icon">📤</div>
                                            <div class="empty-state-title">No Withdrawals Yet</div>
                                            <div class="empty-state-text">You haven't requested any withdrawals. Once you have returns or wish to withdraw, they'll appear here.</div>
                                            <a href="{{ route('withdrawal') }}" class="empty-state-button">Request a Withdrawal</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Filter tab switching
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Hide all empty states
                document.querySelectorAll('[id^="empty-"]').forEach(el => el.style.display = 'none');
                
                // Get all transaction rows
                const rows = document.querySelectorAll('.history-table tbody tr[data-type]');
                let visibleCount = 0;
                
                // Filter table rows
                rows.forEach(row => {
                    if (filter === 'all') {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        if (row.getAttribute('data-type') === filter) {
                            row.style.display = '';
                            visibleCount++;
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
                
                // Show appropriate empty state if no results
                if (visibleCount === 0 && filter !== 'all') {
                    const emptyEl = document.getElementById('empty-' + filter);
                    if (emptyEl) {
                        emptyEl.style.display = '';
                    }
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>



