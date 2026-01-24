<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invest - EMAAR Properties Assets</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
@include('user.partials.navbar-styles')

<style>
    body {
        background-color: #f5f5f5;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .invest-container {
        max-width: 1600px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .page-title {
        font-size: 38px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    .page-subtitle {
        font-size: 16px;
        color: #555;
        margin-bottom: 35px;
    }

    /* Filters */
    .filter-section {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        gap: 10px;
        margin-bottom: 30px;
    }

    .filter-section .btn {
        border-radius: 25px;
        font-size: 13px;
        font-weight: 500;
        white-space: nowrap;
    }

    .filter-section .btn.active {
        background: linear-gradient(135deg,#2563eb 0%,#1e40af 100%);
        color: #fff;
        border: none;
    }

    /* Property Cards */
    .property-card {
        border-radius: 16px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .property-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    .property-image {
        width: 100%;
        height: 220px;
        position: relative;
        overflow: hidden;
    }

    .property-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .property-card:hover .property-image img {
        transform: scale(1.05);
    }

    .property-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: linear-gradient(135deg,#2563eb 0%,#1e40af 100%);
        color: #fff;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .property-info {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .property-type {
        font-size: 12px;
        color: #777;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .property-name {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #111;
    }

    .property-detail {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .property-stats {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .property-stats .stat-label {
        color: #999;
        text-transform: uppercase;
        font-weight: 500;
        font-size: 12px;
    }

    .property-stats .stat-value {
        font-weight: 700;
        color: #111;
        font-size: 14px;
    }

    .invest-button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg,#2563eb 0%,#1e40af 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s;
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
        margin-top: 30px;
    }

    /* Responsive tweaks */
    @media(max-width: 768px) {
        .page-title { font-size: 28px; }
        .property-image { height: 180px; }
    }

    @media(max-width: 480px) {
        .page-title { font-size: 24px; }
        .property-image { height: 150px; }
        .filter-section {
            gap: 5px;
        }
    }
</style>
</head>
<body>
@include('user.partials.navbar')

<div class="invest-container">
    <h1 class="page-title">Browse Available Properties</h1>
    <p class="page-subtitle">Invest in real estate with as little as $100. Build your portfolio one property at a time.</p>

    {{-- Filters --}}
    <div class="filter-section mb-4">
        @php
            $types = ['all' => 'All', 'Single Family Residential' => 'Single Family Residential', 'Vacation Rental' => 'Vacation Rental', 'Funds' => 'Funds', 'Real Estate Debt' => 'Real Estate Debt'];
            $currentType = request('type', 'all');
        @endphp
        @foreach($types as $key => $label)
            <a href="{{ route('invest', ['type'=>$key]) }}" class="btn btn-outline-primary {{ $currentType==$key ? 'active' : '' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

      @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    {{-- Properties Grid --}}
    <div class="row g-4">
        @forelse($investments as $investment)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card property-card position-relative h-100">
                    <div class="property-image">
                       <img src="{{ $investment->image ? asset('images/investments/'.$investment->image) : asset('assets/images/placeholder.png') }}" alt="{{ $investment->name }}" style="height:200px; object-fit:cover;">

                        <span class="property-badge {{ $investment->status == 'available' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($investment->status) }}
                        </span>
                    </div>
                    <div class="property-info d-flex flex-column">
                        <div class="property-type">{{ $investment->type }}</div>
                        <h5 class="property-name">{{ $investment->name }}</h5>
                        <div class="property-detail">
                            <strong>{{ $investment->historic_yield }}% Historic Yield</strong> | ${{ number_format($investment->total_assets) }} Total Net Assets
                        </div>
                        <div class="property-stats">
                            <div>
                                <div class="stat-label">Min Investment</div>
                                <div class="stat-value">${{ number_format($investment->min_investment) }}</div>
                            </div>
                            <div>
                                <div class="stat-label">Investors</div>
                                <div class="stat-value">{{ number_format($investment->investors) }}</div>
                            </div>
                        </div>
                       <form action="{{ route('investments.invest') }}" method="POST" class="mt-auto">
    @csrf
    <input type="hidden" name="investment_id" value="{{ $investment->id }}">

    <button type="submit"
            class="btn btn-success w-100"
            {{ $investment->status != 'available' ? 'disabled' : '' }}>
        Invest Now
    </button>
</form>

                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info text-center">No investments found.</div>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="pagination-container">
        {{ $investments->links('pagination::bootstrap-5') }}
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
