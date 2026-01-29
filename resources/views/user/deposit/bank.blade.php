<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Deposit - EMAAR Properties Assets</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    @include('user.partials.navbar-styles')

    <style>
        body {
            background: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .deposit-container {
            max-width: 900px;
            margin: auto;
            padding: 30px 20px;
        }

        .deposit-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }

        .page-title {
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 25px;
        }

        .bank-box {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .bank-row {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px dashed #ddd;
            font-size: 14px;
        }

        .bank-row:last-child {
            border-bottom: none;
        }

        .amount-box {
            text-align: center;
            margin-bottom: 25px;
        }

        .amount-label {
            font-size: 14px;
            color: #666;
        }

        .amount-value {
            font-size: 38px;
            font-weight: 900;
            color: #059669;
        }

        .info-box {
            background: #f9fafb;
            border-left: 4px solid #059669;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
            transition: .3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(5,150,105,.35);
        }
    </style>
</head>
<body>

@include('user.partials.navbar')

<div class="deposit-container">

    <div class="deposit-card">

        <h1 class="page-title">Bank Transfer Deposit</h1>

        <div class="info-box">
            <strong>Important:</strong> Transfer the exact amount to the bank account below. 
            Upload your payment proof after transfer.
        </div>

        <div class="amount-box">
            <div class="amount-label">Amount To Transfer</div>
            <div class="amount-value">${{ number_format($amount,2) }}</div>
        </div>

        <div class="bank-box">
            <div class="bank-row">
                <span><strong>Bank Name:</strong></span>
                <span>{{ auth()->user()->bank_name ?? 'Not configured' }}</span>
            </div>
            <div class="bank-row">
                <span><strong>Account Name:</strong></span>
                <span>{{ auth()->user()->account_name ?? 'Not configured' }}</span>
            </div>
            <div class="bank-row">
                <span><strong>Account Number:</strong></span>
                <span>{{ auth()->user()->account_number ?? 'Not configured' }}</span>
            </div>
            <div class="bank-row">
                <span><strong>Swift Code:</strong></span>
                <span>{{ auth()->user()->swift_code ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="info-box">
            <ul class="mb-0">
                <li>Always use your username or ID as transfer reference.</li>
                <li>Funds are credited after admin confirmation.</li>
                <li>Incorrect transfers may delay confirmation.</li>
            </ul>
        </div>

<form method="POST" action="{{ route('deposit.make') }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="payment_method" value="bank">
    <input type="hidden" name="amount" value="{{ $amount }}">

    <div class="form-group mb-4">
        <label class="form-label">Bank Name</label>
        <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" required>
    </div>

    <div class="form-group mb-4">
        <label class="form-label">Account Number</label>
        <input type="text" name="account_number" class="form-control" placeholder="Enter account number" required>
    </div>

    <div class="form-group mb-4">
        <label class="form-label">Upload Payment Proof</label>
        <input type="file" name="proof" class="form-control" required>
    </div>

    <button class="submit-btn">Submit Deposit</button>
</form>

    </div>

</div>

</body>
</html>
