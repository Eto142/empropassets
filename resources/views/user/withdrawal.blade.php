<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal - EMAAR Properties Assets</title>
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

        .withdrawal-container {
            max-width: 800px;
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

        .withdrawal-card {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .balance-display {
            background: linear-gradient(135deg, #1E40AF 0%, #2563eb 100%);
            border-radius: 12px;
            padding: 25px;
            color: #fff;
            margin-bottom: 30px;
        }

        .balance-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .balance-amount {
            font-size: 36px;
            font-weight: 900;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .payment-method-tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .payment-method-tab {
            flex: 1;
            padding: 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background-color: #fff;
        }

        .payment-method-tab.active {
            border-color: #2563eb;
            background-color: #eff6ff;
        }

        .payment-method-tab:hover {
            border-color: #2563eb;
        }

        .payment-method-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .payment-method-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d1fae5;
            color: #047857;
            border: 1px solid #10b981;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }

        .info-box {
            background-color: #f9fafb;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 25px;
        }

        .info-box-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .info-box-text {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .withdrawal-container {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 24px;
            }

            .withdrawal-card {
                padding: 20px;
            }

            .balance-amount {
                font-size: 28px;
            }

            .payment-method-tabs {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @include('user.partials.navbar')

    <div class="withdrawal-container">
        <div class="page-header">
            <h1 class="page-title">Withdraw Funds</h1>
            <p class="page-subtitle">Request a withdrawal from your EMAAR Properties Assets cash balance</p>
        </div>

        <div class="withdrawal-card">
            <div class="balance-display">
                <div class="balance-label">Available Balance</div>
                <div class="balance-amount">$0.00</div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="info-box">
                <div class="info-box-title">Withdrawal Information</div>
                <div class="info-box-text">
                    Withdrawals typically process within 3-5 business days. Minimum withdrawal amount is $10. 
                    Please ensure your account information is correct before submitting.
                </div>
            </div>

            <form method="POST" action="{{ route('withdrawal.submit') }}" id="withdrawalForm">
                @csrf
                <input type="hidden" name="withdrawal_type" id="withdrawal_type" value="bank">

                <div class="payment-method-tabs">
                    <div class="payment-method-tab active" onclick="selectPaymentMethod('bank')">
                        <div class="payment-method-icon">🏦</div>
                        <div class="payment-method-label">Bank Transfer</div>
                    </div>
                    <div class="payment-method-tab" onclick="selectPaymentMethod('crypto')">
                        <div class="payment-method-icon">₿</div>
                        <div class="payment-method-label">Crypto Wallet</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="0.00" min="10" step="0.01" required>
                </div>

                <div id="bankFields">
                    <div class="form-group">
                        <label class="form-label">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Account Name</label>
                        <input type="text" name="account_name" class="form-control" placeholder="Enter account name">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Account Number</label>
                        <input type="text" name="account_number" class="form-control" placeholder="Enter account number">
                    </div>

                    <div class="form-group">
                        <label class="form-label">SWIFT Code</label>
                        <input type="text" name="swift_code" class="form-control" placeholder="Enter SWIFT code">
                    </div>
                </div>

                <div id="cryptoFields" style="display: none;">
                    <div class="form-group">
                        <label class="form-label">Crypto Network</label>
                        <select name="crypto_network" class="form-control">
                            <option value="">Select network</option>
                            <option value="Bitcoin">Bitcoin</option>
                            <option value="Ethereum">Ethereum</option>
                            <option value="USDT">USDT (TRC20)</option>
                            <option value="USDC">USDC</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Wallet Address</label>
                        <input type="text" name="wallet_address" class="form-control" placeholder="Enter wallet address">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Narration (Optional)</label>
                    <textarea name="narration" class="form-control" rows="3" placeholder="Add a note about this withdrawal"></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Withdrawal Request</button>
            </form>
        </div>
    </div>

    <script>
        function selectPaymentMethod(type) {
            document.getElementById('withdrawal_type').value = type;
            
            // Update tabs
            document.querySelectorAll('.payment-method-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            // Show/hide fields
            if (type === 'bank') {
                document.getElementById('bankFields').style.display = 'block';
                document.getElementById('cryptoFields').style.display = 'none';
            } else {
                document.getElementById('bankFields').style.display = 'none';
                document.getElementById('cryptoFields').style.display = 'block';
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>



