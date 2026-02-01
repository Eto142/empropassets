<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Deposit - EMAAR Properties Assets</title>

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

        .wallet-box {
            background: #f1f5f9;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin-bottom: 25px;
        }

        .wallet-address {
            background: #fff;
            border: 1px dashed #2563eb;
            padding: 12px;
            border-radius: 8px;
            font-weight: 700;
            word-break: break-all;
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
            color: #2563eb;
        }

        .info-box {
            background: #f9fafb;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
            transition: .3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37,99,235,.35);
        }
    </style>
</head>
<body>

@include('user.partials.navbar')

<div class="deposit-container">

    <div class="deposit-card">

        <h1 class="page-title">Crypto Deposit</h1>

        <div class="info-box">
            <strong>Important:</strong> Send the exact amount to the wallet address below. 
            Upload payment proof after sending.
        </div>

        <div class="amount-box">
            <div class="amount-label">Amount To Send</div>
            <div class="amount-value">${{ number_format($amount,2) }}</div>
            <div class="text-muted">{{ strtoupper($crypto) }}</div>
        </div>

        <div class="wallet-box">
            <div class="mb-2 fw-bold">Send {{ strtoupper($crypto) }} To This Wallet</div>
            <div class="wallet-address" id="walletAddress">
                @if(!empty($wallet_address))
                    {{ $wallet_address }}
                @else
                    {{ config('crypto.' . strtolower($crypto)) ?? 'Wallet address not configured. Please contact support.' }}
                @endif
            </div>
            @if(!empty($destination_tag))
                <div class="mt-2 text-muted">Destination Tag: <strong>{{ $destination_tag }}</strong></div>
            @endif
            <button onclick="copyWallet()" type="button" class="btn btn-primary btn-sm mt-3">
                Copy Address
            </button>
        </div>

        <div class="info-box">
            <ul class="mb-0">
                <li>Send only <b>{{ strtoupper($crypto) }}</b> to this address.</li>
                <li>Sending wrong asset or network may result in permanent loss.</li>
                <li>Deposit credited after blockchain confirmation.</li>
            </ul>
        </div>

        <form method="POST" action="{{ route('deposit.make') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="payment_method" value="crypto">
            <input type="hidden" name="crypto_type" value="{{ $crypto }}">
            <input type="hidden" name="amount" value="{{ $amount }}">

            <div class="form-group mb-4">
                <label class="form-label">Upload Payment Proof</label>
                <input type="file" name="proof" class="form-control" required>
            </div>

            <button class="submit-btn">Submit Deposit</button>
        </form>

    </div>

</div>

<script>
    function copyWallet(){
        navigator.clipboard.writeText(document.getElementById('walletAddress').innerText);
        alert("Wallet address copied!");
    }
</script>

</body>
</html>
