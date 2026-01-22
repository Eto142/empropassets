@include('home.header')

<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); padding: 100px 0; color: #fff;">
    <div class="container text-center">
        <h1 style="font-size: 56px; font-weight: 900; margin-bottom: 20px;">Start Investing Today</h1>
        <p style="font-size: 20px; opacity: 0.9;">Browse available properties and start building your real estate portfolio with as little as $100.</p>
        <div class="mt-4" style="display:flex; justify-content:center; gap: 20px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #fff; color: #2563eb; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration:none; border:2px solid #2563eb;">Browse Investments</a>
            @else
                <a href="{{ route('login') }}" style="background: #fff; color: #2563eb; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration:none; border:2px solid #2563eb;">Login to Invest</a>
            @endif
            <a href="{{ route('show.register') }}" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration:none;">Create Account</a>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="invest-content" style="padding: 80px 0;">
    <div class="container text-center">
        <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 20px;">How It Works</h2>
        <p style="font-size: 18px; color: #666; max-width: 700px; margin: 0 auto 50px;">Investing in real estate has never been easier. Follow these simple steps to get started.</p>

        <div class="row">
            @php
                $steps = [
                    ['1', 'Create Account', 'Sign up in minutes with just your email and basic information. No credit check required to browse.'],
                    ['2', 'Browse Properties', 'Explore our curated selection of rental properties. Each listing includes detailed financial projections and property information.'],
                    ['3', 'Invest & Earn', 'Purchase shares starting at $100. Receive monthly dividends and benefit from property appreciation over time.']
                ];
            @endphp
            @foreach($steps as $step)
                <div class="col-lg-4 mb-4">
                    <div style="text-align:center; padding:30px;">
                        <div style="width:80px; height:80px; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); border-radius:50%; margin:0 auto 25px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:36px; font-weight:900;">
                            {{ $step[0] }}
                        </div>
                        <h3 style="font-size:24px; font-weight:700; margin-bottom:15px;">{{ $step[1] }}</h3>
                        <p style="color:#666; line-height:1.6;">{{ $step[2] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section style="background:#f9fafb; padding:80px 0;">
    <div class="container text-center">
        <h2 style="font-size:42px; font-weight:900; margin-bottom:50px;">Why Invest with EMAAR Properties Assets?</h2>
        <div class="row">
            @php
                $features = [
                    ['💰', 'Low Minimum Investment', 'Start with just $100 per property'],
                    ['📊', 'Monthly Dividends', 'Receive regular income from rental properties'],
                    ['🏠', 'No Management Hassle', 'We handle all property management for you']
                ];
            @endphp
            @foreach($features as $feature)
                <div class="col-lg-4 mb-4">
                    <div style="font-size:48px; margin-bottom:15px;">{{ $feature[0] }}</div>
                    <h4 style="font-size:20px; font-weight:700; margin-bottom:10px;">{{ $feature[1] }}</h4>
                    <p style="color:#666;">{{ $feature[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Investment Cards Section -->
<section style="padding:80px 0;">
    <div class="container">
        <h2 class="text-center" style="font-size:42px; font-weight:900; margin-bottom:50px;">Available Investments</h2>

        <!-- Filters -->
        <div class="mb-4 d-flex flex-wrap gap-2 justify-content-center">
            @php
                $types = ['all' => 'All', 'Single Family Residential' => 'Single Family Residential', 'Vacation Rental' => 'Vacation Rental', 'Funds' => 'Funds', 'Real Estate Debt' => 'Real Estate Debt'];
                $currentType = request('type', 'all');
            @endphp
            @foreach($types as $key => $label)
                <a href="{{ route('invest', ['type'=>$key]) }}" class="btn btn-outline-primary {{ $currentType==$key ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        <!-- Investment Grid -->
        <div class="row g-4">
            @forelse($investments as $investment)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 property-card position-relative">
                        <div class="property-image position-relative">
                            <img src="{{ $investment->image ? asset('storage/'.$investment->image) : '/images/placeholder.png' }}" alt="{{ $investment->name }}" style="height:200px; object-fit:cover;">
                            <span class="property-badge {{ $investment->status == 'available' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($investment->status) }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column property-info">
                            <div class="property-type">{{ $investment->type }}</div>
                            <h5 class="property-name">{{ $investment->name }}</h5>
                            <div class="property-detail mb-3">
                                <strong>{{ $investment->historic_yield }}% Historic Yield</strong> | ${{ number_format($investment->total_assets) }} Total Net Assets
                            </div>

                            <div class="d-flex justify-content-between property-stats mb-3">
                                <div>
                                    <div class="stat-label text-muted" style="font-size:0.75rem;">Min Investment</div>
                                    <div class="stat-value">${{ number_format($investment->min_investment) }}</div>
                                </div>
                                <div>
                                    <div class="stat-label text-muted" style="font-size:0.75rem;">Investors</div>
                                    <div class="stat-value">{{ number_format($investment->investors) }}</div>
                                </div>
                            </div>

                            <a href="{{ auth()->check() ? route('invest') : route('login') }}" class="btn invest-button mt-auto">
                                Invest Now
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-info text-center">No investments found.</div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $investments->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>

@include('home.footer')
