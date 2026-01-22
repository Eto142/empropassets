<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit - EMAAR Properties Assets</title>
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

        .deposit-container {
            max-width: 900px;
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

        .deposit-card {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .balance-display {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
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

        .payment-methods-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .payment-method-card {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background-color: #fff;
        }

        .payment-method-card:hover {
            border-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .payment-method-card.active {
            border-color: #2563eb;
            background-color: #eff6ff;
        }

        .payment-method-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .payment-method-label {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .payment-method-desc {
            font-size: 12px;
            color: #666;
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

        .quick-amounts {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .quick-amount-btn {
            padding: 8px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: #fff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            color: #666;
            transition: all 0.2s;
        }

        .quick-amount-btn:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        .quick-amount-btn.active {
            border-color: #2563eb;
            background-color: #eff6ff;
            color: #2563eb;
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

        @media (max-width: 768px) {
            .deposit-container {
                padding: 20px 15px;
            }

            .page-title {
                font-size: 24px;
            }

            .deposit-card {
                padding: 20px;
            }

            .balance-amount {
                font-size: 28px;
            }

            .payment-methods-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('user.partials.navbar')

    <div class="deposit-container">
        <div class="page-header">
            <h1 class="page-title">Deposit Funds</h1>
            <p class="page-subtitle">Add funds to your account to start investing</p>
        </div>

        <div class="deposit-card">
            <div class="balance-display">
                <div class="balance-label">Current Balance</div>
                <div class="balance-amount">$0.00</div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="info-box">
                <div class="info-box-title">Deposit Information</div>
                <div class="info-box-text">
                    Minimum deposit amount is $10. Funds are typically available immediately after processing. 
                    All deposits are secure and encrypted.
                </div>
            </div>

            <form method="POST" action="{{ route('deposit.submit') }}" id="depositForm">
                @csrf
                <input type="hidden" name="payment_method" id="payment_method" value="bank">

                <div class="form-group">
                    <label class="form-label">Select Payment Method</label>
                    <div class="payment-methods-grid">
                        <div class="payment-method-card active" onclick="selectPaymentMethod('bank')">
                            <div class="payment-method-icon">🏦</div>
                            <div class="payment-method-label">Bank Transfer</div>
                            <div class="payment-method-desc">3-5 business days</div>
                        </div>
                        <div class="payment-method-card" onclick="selectPaymentMethod('card')">
                            <div class="payment-method-icon">💳</div>
                            <div class="payment-method-label">Credit/Debit Card</div>
                            <div class="payment-method-desc">Instant</div>
                        </div>
                        <div class="payment-method-card" onclick="selectPaymentMethod('crypto')">
                            <div class="payment-method-icon">₿</div>
                            <div class="payment-method-label">Cryptocurrency</div>
                            <div class="payment-method-desc">Instant</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Amount</label>
                    <div class="quick-amounts">
                        <button type="button" class="quick-amount-btn" onclick="setAmount(100)">$100</button>
                        <button type="button" class="quick-amount-btn" onclick="setAmount(500)">$500</button>
                        <button type="button" class="quick-amount-btn" onclick="setAmount(1000)">$1,000</button>
                        <button type="button" class="quick-amount-btn" onclick="setAmount(5000)">$5,000</button>
                    </div>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="0.00" min="10" step="0.01" required>
                </div>

                <div id="bankFields">
                    <div class="form-group">
                        <label class="form-label">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Account Number</label>
                        <input type="text" name="account_number" class="form-control" placeholder="Enter account number" required>
                    </div>
                </div>

                <div id="cardFields" style="display: none;">
                    <div class="form-group">
                        <label class="form-label">Card Number</label>
                        <input type="text" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Expiry Date</label>
                            <input type="text" name="expiry_date" class="form-control" placeholder="MM/YY" maxlength="5">
                        </div>
                        <div class="form-group">
                            <label class="form-label">CVV</label>
                            <input type="text" name="cvv" class="form-control" placeholder="123" maxlength="4">
                        </div>
                    </div>
                </div>

                <div id="cryptoFields" style="display: none;">
                    <div class="form-group">
                        <label class="form-label">Select Cryptocurrency</label>
                        <select name="crypto_type" class="form-control">
                            <option value="Bitcoin">Bitcoin (BTC)</option>
                            <option value="Ethereum">Ethereum (ETH)</option>
                            <option value="USDT">USDT</option>
                            <option value="USDC">USDC</option>
                        </select>
                    </div>
                    <div class="info-box">
                        <div class="info-box-text">
                            You will receive wallet address details after submitting this form. 
                            Send the exact amount to the provided address.
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Continue to Payment</button>
            </form>
        </div>
    </div>

    <script>
        function selectPaymentMethod(method) {
            document.getElementById('payment_method').value = method;
            
            // Update cards
            document.querySelectorAll('.payment-method-card').forEach(card => {
                card.classList.remove('active');
            });
            event.currentTarget.classList.add('active');

            // Show/hide fields
            document.getElementById('bankFields').style.display = method === 'bank' ? 'block' : 'none';
            document.getElementById('cardFields').style.display = method === 'card' ? 'block' : 'none';
            document.getElementById('cryptoFields').style.display = method === 'crypto' ? 'block' : 'none';
        }

        function setAmount(amount) {
            document.getElementById('amount').value = amount;
            document.querySelectorAll('.quick-amount-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>



