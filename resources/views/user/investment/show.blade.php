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
</style>
</head>
<body>
@include('user.partials.navbar')

<div class="details-container">

<div class="row g-5">

    {{-- LEFT CONTENT --}}
    <div class="col-lg-8">

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

                <div class="mb-3">
                    <label class="form-label">Number of Shares</label>
                    <input type="number" min="1" value="1" class="form-control" id="shares">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price per Share</label>
                    <input type="text" value="${{ $investment->share_price ?? 100 }}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Investment</label>
                    <input type="text" id="total" class="form-control fw-bold">
                </div>

                <button class="invest-btn">
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
        total.value =  (shares.value * price).toLocaleString();
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
