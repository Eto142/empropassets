<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $investment->name }} - Property Details</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
@include('user.partials.navbar-styles')

<style>
    body {
        background: #f5f5f5;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .details-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .hero-image img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,.15);
        transition: 0.3s;
    }

    .hero-image img:hover {
        transform: scale(1.02);
    }

    .thumbs img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        cursor: pointer;
        transition: .3s;
    }

    .thumbs img:hover {
        transform: scale(1.05);
    }

    .property-title {
        font-size: 36px;
        font-weight: 900;
        margin-top: 20px;
    }

    .property-location {
        font-size: 14px;
        color: #777;
    }

    .stat-box {
        background: #fff;
        border-radius: 14px;
        padding: 18px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,.08);
        transition: 0.3s;
    }

    .stat-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,.12);
    }

    .stat-label {
        font-size: 12px;
        color: #999;
        text-transform: uppercase;
        font-weight: 600;
    }

    .stat-value {
        font-size: 18px;
        font-weight: 800;
    }

    .section-title {
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .invest-card {
        background: #fff;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0,0,0,.1);
        position: sticky;
        top: 100px;
    }

    .invest-btn {
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg,#2563eb 0%,#1e40af 100%);
        color: #fff;
        font-weight: 800;
        transition: 0.3s;
    }

    .invest-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .ticker-container {
        background: linear-gradient(90deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        color: #fff;
        padding: 0;
        overflow: hidden;
        border-radius: 12px 12px 0 0;
        position: relative;
        font-weight: 500;
        font-size: 13px;
        height: 50px;
        display: flex;
        align-items: center;
        border-bottom: 3px solid #2563eb;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }

    .ticker-label {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        padding: 0 16px;
        height: 100%;
        display: flex;
        align-items: center;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff;
        white-space: nowrap;
        min-width: fit-content;
        border-right: 1px solid rgba(255,255,255,0.1);
    }

    .ticker-content-wrapper {
        flex: 1;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    .ticker-content {
        display: flex;
        animation: scroll 40s linear infinite;
        height: 100%;
        align-items: center;
    }

    .ticker-item {
        white-space: nowrap;
        padding: 0 40px;
        height: 100%;
        display: flex;
        align-items: center;
        border-right: 2px solid rgba(255,255,255,0.1);
        font-size: 13px;
        color: #e2e8f0;
        transition: color 0.3s;
    }

    .ticker-item:hover {
        color: #fff;
    }

    .ticker-item-value {
        color: #10b981;
        font-weight: 700;
        margin-left: 8px;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }
</style>
</head>
<body>
@include('user.partials.navbar')

<div class="details-container">

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-5">

    {{-- LEFT CONTENT --}}
    <div class="col-lg-8">

        {{-- Market Ticker --}}
        <div class="ticker-container">
            <div class="ticker-label">🏢 LIVE MARKET</div>
            <div class="ticker-content-wrapper">
                <div class="ticker-content">
                    <div class="ticker-item">Market Update <span class="ticker-item-value">+2.5%</span></div>
                    <div class="ticker-item">Property Index <span class="ticker-item-value">+1.8%</span></div>
                    <div class="ticker-item">Avg Yield <span class="ticker-item-value">11.2%</span></div>
                    <div class="ticker-item">Total Assets <span class="ticker-item-value">$2.3B</span></div>
                    <div class="ticker-item">Active Deals <span class="ticker-item-value">342</span></div>
                    <div class="ticker-item">Investors <span class="ticker-item-value">15K+</span></div>
                    <!-- Duplicated for seamless loop -->
                    <div class="ticker-item">Market Update <span class="ticker-item-value">+2.5%</span></div>
                    <div class="ticker-item">Property Index <span class="ticker-item-value">+1.8%</span></div>
                    <div class="ticker-item">Avg Yield <span class="ticker-item-value">11.2%</span></div>
                    <div class="ticker-item">Total Assets <span class="ticker-item-value">$2.3B</span></div>
                    <div class="ticker-item">Active Deals <span class="ticker-item-value">342</span></div>
                    <div class="ticker-item">Investors <span class="ticker-item-value">15K+</span></div>
                </div>
            </div>
        </div>

        {{-- Main Image --}}
        <div class="hero-image">
            <img id="mainImage"
                 src="{{ $investment->image ? asset('images/investments/'.$investment->image) : asset('assets/images/placeholder.png') }}">
        </div>

        {{-- Thumbnails --}}
        <div class="row g-2 mt-3 thumbs">
            @if($investment->gallery)
                @foreach(json_decode($investment->gallery) as $img)
                    <div class="col-4">
                        <img onclick="swapImage(this)"
                             src="{{ asset('images/investments/gallery/'.$img) }}">
                    </div>
                @endforeach
            @else
                @for($i=1;$i<=3;$i++)
                    <div class="col-4">
                        <img onclick="swapImage(this)"
                             src="{{ asset('assets/images/placeholder.png') }}">
                    </div>
                @endfor
            @endif
        </div>

        {{-- Title --}}
        <h1 class="property-title">{{ $investment->name }}</h1>
        <div class="property-location">{{ $investment->location ?? 'Prime Location, Downtown' }}</div>

        {{-- Stats --}}
        <div class="row g-3 mt-3">
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-label">Yield</div>
                    <div class="stat-value">{{ $investment->historic_yield }}%</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-label">Value</div>
                    <div class="stat-value">${{ number_format($investment->total_assets) }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-label">Min Invest</div>
                    <div class="stat-value">${{ number_format($investment->min_investment) }}</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-label">Investors</div>
                    <div class="stat-value">{{ number_format($investment->investors) }}</div>
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="mt-5">
            <div class="section-title">Property Description</div>
            <p class="text-muted">
                {{ $investment->description ?? 'This luxury property is located in a prime district, offering modern finishes, premium amenities, and strong rental demand. Professionally managed for stable cash flow and long-term appreciation.' }}
            </p>
        </div>

        {{-- Property Details --}}
        <div class="mt-4">
            <div class="section-title">Property Details</div>
            <div class="row g-3">
                <div class="col-md-4">🏠 Type: {{ $investment->type }}</div>
                <div class="col-md-4">📐 Size: {{ $investment->size ?? 'N/A' }} sqft</div>
                <div class="col-md-4">🛏 Bedrooms: {{ $investment->bedrooms ?? 'N/A' }}</div>
                <div class="col-md-4">🛁 Bathrooms: {{ $investment->bathrooms ?? 'N/A' }}</div>
                <div class="col-md-4">🚗 Parking: {{ $investment->parking ?? 'N/A' }}</div>
                <div class="col-md-4">📅 Built: {{ $investment->year_built ?? 'N/A' }}</div>
            </div>
        </div>

        {{-- Amenities --}}
        @if($investment->amenities)
        <div class="mt-4">
            <div class="section-title">Amenities</div>
            <div class="row g-2">
                @foreach(json_decode($investment->amenities) as $amenity)
                    <div class="col-6 col-md-4">✔ {{ $amenity }}</div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- RIGHT INVEST BOX --}}
    <div class="col-lg-4">
        <div class="invest-card">
            <h5 class="fw-bold mb-3">Invest in this Property</h5>

            <form action="{{ route('investments.invest') }}" method="POST">
                @csrf
                <input type="hidden" name="investment_id" value="{{ $investment->id }}">
                <input type="hidden" name="investment_name" value="{{ $investment->name }}">
                <input type="hidden" name="investment_type" value="{{ $investment->type }}">
                <input type="hidden" name="share_price" value="{{ $investment->share_price ?? 100 }}">
                <input type="hidden" name="min_investment" value="{{ $investment->min_investment }}">
                <input type="hidden" name="historic_yield" value="{{ $investment->historic_yield }}">
                <input type="hidden" name="total_assets" value="{{ $investment->total_assets }}">
                <input type="hidden" name="location" value="{{ $investment->location }}">
                <input type="hidden" name="size" value="{{ $investment->size }}">
                <input type="hidden" name="bedrooms" value="{{ $investment->bedrooms }}">
                <input type="hidden" name="bathrooms" value="{{ $investment->bathrooms }}">
                <input type="hidden" name="parking" value="{{ $investment->parking }}">
                <input type="hidden" name="year_built" value="{{ $investment->year_built }}">
                <input type="hidden" name="amenities" value="{{ $investment->amenities }}">
                <input type="hidden" name="description" value="{{ $investment->description }}">
                <input type="hidden" name="image" value="{{ $investment->image }}">
                <input type="hidden" name="gallery" value="{{ $investment->gallery }}">

                <div class="mb-3">
                    <label class="form-label">Number of Shares</label>
                    <input type="number" name="shares" min="1" value="1" class="form-control" id="shares">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price per Share</label>
                    <input type="text" name="price_per_share" value="${{ $investment->share_price ?? 100 }}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Investment Amount</label>
                    <input type="number" name="amount" id="total" class="form-control fw-bold" step="0.01" required>
                    <small class="text-muted d-block mt-1">Minimum: ${{ number_format($investment->min_investment, 2) }}</small>
                </div>

                <button class="invest-btn" type="submit">
                    Invest Now
                </button>

            </form>
        </div>
    </div>

</div>

</div>

<script>
    const shares = document.getElementById('shares');
    const total = document.getElementById('total');
    const price = {{ $investment->share_price ?? 100 }};

    function calc(){
        total.value = shares.value * price;
    }

    shares.addEventListener('input', calc);
    calc();

    function swapImage(el){
        document.getElementById('mainImage').src = el.src;
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
