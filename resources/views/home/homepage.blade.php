@include('home.header')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="hero-title">Buy, sell, & own shares of real estate.</h1>
                    <p class="hero-subtitle"> Discover Smart Real Estate Investments with Emaar Properties Assets

Are you ready to grow your wealth through strategic real estate investments? At Emaar Properties Assets, we connect investors with short-term and high-performance real estate opportunities designed to deliver impressive returns while maintaining transparency and control.
 Access monthly cash flow and appreciation potential without the work.</p>
                    <a href="{{ route('show.register') }}" class="btn-primary-large" style="text-decoration: none; display: inline-block;">JOIN 933K REGISTERED INVESTORS</a>
                </div>
                <div class="col-lg-6">
                    <div class="property-grid">
                        <div class="property-card">
                            <img src="images/hero-property.jpg" alt="Property 1">
                        </div>
                        <div class="property-card" style="position: relative;">
                            <img src="images/brick-house.jpg" alt="Property 2">
                            <div class="investor-badge badge-top-right">1,277 Investors</div>
                        </div>
                        <div class="property-card">
                            <img src="images/modern-house.jpg" alt="Property 3">
                        </div>
                        <div class="property-card" style="position: relative;">
                            <img src="images/dark-blue-house.jpg" alt="Property 4">
                            <div class="investor-badge badge-bottom-right">766 Investors</div>
                        </div>
                    </div>
                </div>
            </div>
    
                    <!-- Investment Highlights Section -->
                    <section class="investment-highlights-section py-5">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-12 col-lg-9">
                                    <h2 class="section-title">Flexible Short-Term Investment Options</h2>
                                    <p class="section-description mb-3">Whether you’re new to real estate or an experienced investor, we offer a range of flexible short-term investment plans designed to fit your goals. Our opportunities typically yield competitive monthly returns that reflect the success of our property portfolios and market growth.</p>
                                    <p class="section-description mb-4">With plans ranging from entry-level investments to premium asset shares, investors can diversify easily while maintaining liquidity and measurable growth.</p>
                                </div>
                            </div>

                            <div class="row mb-5 align-items-start">
                                <div class="col-md-7">
                                    <div class="mb-4">
                                        <h3>Transparency and Real-Time Tracking</h3>
                                        <p>At Emaar Properties Assets, we believe in complete transparency. That’s why every investor receives 24/7 access to our investment portal, where you can:</p>
                                        <ul class="feature-list">
                                            <li>Monitor your portfolio performance in real time</li>
                                            <li>Track your profits and earnings growth</li>
                                            <li>View detailed reports on your shares and active projects</li>
                                            <li>Manage your withdrawals securely and efficiently</li>
                                        </ul>
                                        <p>Our platform gives you full control empowering you to make informed decisions every step of the way.</p>
                                    </div>
                                    <div>
                                        <h3>Built on Trust and Proven Performance</h3>
                                        <p>Every project we undertake is backed by rigorous market analysis, experienced real estate professionals, and a clear strategy for sustainable profit. From urban redevelopment to residential expansions, our success is driven by vision, discipline, and integrity.</p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="cta-card" style="border:1px solid #e9e9e9; padding:28px; border-radius:10px; background:#fff; box-shadow:0 4px 14px rgba(16,24,40,0.06); text-align:center;">
                                        <div style="font-weight:600; margin-bottom:12px;">Ready to get started?</div>
                                        <p style="color:#555; margin-bottom:18px;">Join thousands of investors building passive income through short-term real estate plans.</p>
                                        <a href="{{ route('show.register') }}" class="btn-primary-large" style="text-decoration: none; display: inline-block;">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        </div>
    </section>

    <!-- Returns Section -->
    <section class="returns-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8">
                    <h2 class="returns-title">Why Invest in Real Estate with Us?</h2>
                    <p class="returns-subtitle">Real estate has long been one of the most reliable paths to financial freedom. Through our expert-led property acquisitions and development partnerships, we help investors gain access to both residential and commercial projects with strong earning potential without the hassle of managing properties themselves.</p>
                    <p class="returns-subtitle"> Market capitalization of Emaar Properties (EMAAR.AE)
Market cap: $35.25 Billion USD

As of January 2026 Emaar Properties has a market cap of $35.25 Billion USD. This makes Emaar Properties the world's 686th most valuable company by market cap according to our data. The market capitalization, commonly called market cap, is the total market value of a publicly traded company's outstanding shares and is commonly used to measure how much a company is worth.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="carousel-buttons">
                        <button class="carousel-btn">←</button>
                        <button class="carousel-btn">→</button>
                    </div>
                </div>
            </div>

            <div class="image-grid-3">
                <div class="image-card">
                    <img src="images/hero-property.jpg" alt="Property">
                </div>
                <div class="image-card">
                    <img src="images/modern-house.jpg" alt="Property">
                </div>
                <div class="image-card">
                    <img src="images/brick-house.jpg" alt="Property">
                </div>
            </div>

            <div class="stats-section">
                <div class="stat-item">
                    <h3>$366M</h3>
                    <p>Total Invested</p>
                </div>
                <div class="stat-item">
                    <h3>$59M</h3>
                    <p>Distributed to Investors</p>
                </div>
                <div class="stat-item">
                    <h3>4.8★</h3>
                    <p>Investor Rating</p>
                </div>
            </div>

            <div class="investment-properties" style="margin-top: 60px; padding: 40px 0; border-top: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; overflow: hidden; background: linear-gradient(to right, #fff 0%, #f8f9fa 50%, #fff 100%);">
                <style>
                    @keyframes marquee {
                        0% { transform: translateX(100%); }
                        100% { transform: translateX(-100%); }
                    }
                    .marquee-container {
                        display: flex;
                        animation: marquee 40s linear infinite;
                        gap: 60px;
                        white-space: nowrap;
                    }
                    .marquee-container:hover {
                        animation-play-state: paused;
                    }
                    .property-item {
                        flex-shrink: 0;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        padding: 20px 40px;
                        border-right: 1px solid #e0e0e0;
                    }
                    .property-item:last-child {
                        border-right: none;
                    }
                    .property-item h4 {
                        font-size: 16px;
                        font-weight: 700;
                        color: #1a1a2e;
                        margin-bottom: 8px;
                        letter-spacing: 0.5px;
                    }
                    .property-item p {
                        font-size: 14px;
                        color: #666;
                        font-weight: 600;
                        margin: 0;
                    }
                    .property-item p strong {
                        color: #059669;
                        font-weight: 700;
                    }
                </style>
                <div class="marquee-container">
                    <div class="property-item">
                        <h4>THE CUPCAKE</h4>
                        <p>$16.21 <strong>↑ 62.1%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE WENTWORTH</h4>
                        <p>$15.55 <strong>↑ 55.5%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE MOJAVE</h4>
                        <p>$15.70 <strong>↑ 57%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE CENTENNIAL</h4>
                        <p>$12.02 <strong>↑ 20.2%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE EASTFAIR</h4>
                        <p style="color: #e8a87c; font-weight: 700;">Coming Soon</p>
                    </div>
                    <!-- Duplicate for seamless loop -->
                    <div class="property-item">
                        <h4>THE CUPCAKE</h4>
                        <p>$16.21 <strong>↑ 62.1%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE WENTWORTH</h4>
                        <p>$15.55 <strong>↑ 55.5%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE MOJAVE</h4>
                        <p>$15.70 <strong>↑ 57%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE CENTENNIAL</h4>
                        <p>$12.02 <strong>↑ 20.2%</strong></p>
                    </div>
                    <div class="property-item">
                        <h4>THE EASTFAIR</h4>
                        <p style="color: #e8a87c; font-weight: 700;">Coming Soon</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="text-center">
                <p class="testimonial-quote">
                    "EMAAR Properties Assets, signed up 12,000 people to invest in 150 rental homes in the past year, with more than 100,000 others applying to make future investments through the company."
                </p>
                <p style="color: #999; font-size: 12px; font-weight: bold; margin-bottom: 30px;">AS SEEN ON:</p>
                <div class="media-logos">
                    <span class="media-logo">yahoo! finance</span>
                    <span class="media-logo">Bloomberg</span>
                    <span class="media-logo">BUSINESS INSIDER</span>
                    <span class="media-logo">WSJ</span>
                    <span class="media-logo" style="color: #333;">TechCrunch</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="team-image">
                        <img src="images/team-member.jpg" alt="Team member">
                        <div class="play-overlay">
                            <div class="play-button">▶</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team-content">
                        <h2>Our team's 20+ years of experience goes into every property selection.</h2>
                        <p>Get a 2-minute look at our proven property selection process with Cameron Wu, VP of Investments.</p>
                        <div class="company-origin">
                            <div class="company-origin-label">WHERE WE COME FROM</div>
                            <div class="company-list">
                                <span>amh</span>
                                <span>amazon</span>
                                <span>Goldman Sachs</span>
                                <span>Uber</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio-section">
        <div class="container">
            <div class="portfolio-header">
                <h2 class="portfolio-title">Build a diversified real estate portfolio with 502+ properties across the country.</h2>
                <a href="{{ route('invest.public') }}" class="btn-browse" style="text-decoration: none; display: inline-block;">BROWSE AVAILABLE PROPERTIES</a>
            </div>
            <div class="map-container">
                <img src="images/us-map.jpg" alt="US Property Distribution Map">
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section style="padding: 80px 0; background: #f9fafb;">
        <div class="container">
            <!-- Investment Properties -->
            @if($featuredInvestments->count() > 0)
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 style="font-size: 36px; font-weight: 900; margin-bottom: 10px;">Investment Opportunities</h2>
                        <p style="color: #666; font-size: 16px;">Start earning monthly dividends from rental properties</p>
                    </div>
                    <a href="{{ route('invest.public', ['listing' => 'investment']) }}" class="btn btn-primary">View All</a>
                </div>
                <div class="row g-4">
                    @foreach($featuredInvestments as $property)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm" style="border: none; border-radius: 12px; overflow: hidden; transition: transform 0.3s;">
                            <img src="{{ $property->image ? asset('images/investments/'.$property->image) : asset('assets/images/placeholder.png') }}" 
                                 alt="{{ $property->name }}" 
                                 style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $property->name }}</h5>
                                <p class="text-muted mb-2"><i class="bi bi-geo-alt"></i> {{ $property->location ?? 'Prime Location' }}</p>
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <small class="text-muted">Historic Yield</small>
                                        <div class="fw-bold text-success">{{ $property->historic_yield }}%</div>
                                    </div>
                                    <div>
                                        <small class="text-muted">Min Investment</small>
                                        <div class="fw-bold">${{ number_format($property->min_investment) }}</div>
                                    </div>
                                </div>
                                <a href="{{ auth()->check() ? route('investments.show', $property->id) : route('login') }}" class="btn btn-primary w-100">Invest Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Properties For Sale -->
            @if($featuredForSale->count() > 0)
            <div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 style="font-size: 36px; font-weight: 900; margin-bottom: 10px;">Properties For Sale</h2>
                        <p style="color: #666; font-size: 16px;">Own premium real estate properties outright</p>
                    </div>
                    <a href="{{ route('invest.public', ['listing' => 'for_sale']) }}" class="btn btn-success">View All</a>
                </div>
                <div class="row g-4">
                    @foreach($featuredForSale as $property)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm" style="border: none; border-radius: 12px; overflow: hidden; transition: transform 0.3s;">
                            <div class="position-relative">
                                <img src="{{ $property->image ? asset('images/investments/'.$property->image) : asset('assets/images/placeholder.png') }}" 
                                     alt="{{ $property->name }}" 
                                     style="height: 220px; object-fit: cover;">
                                <span class="badge bg-success position-absolute top-0 end-0 m-2">For Sale</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $property->name }}</h5>
                                <p class="text-muted mb-2"><i class="bi bi-geo-alt"></i> {{ $property->location ?? 'Prime Location' }}</p>
                                <div class="mb-3">
                                    <small class="text-muted">Sale Price</small>
                                    <h4 class="fw-bold text-primary mb-0">${{ number_format($property->sale_price ?? 0) }}</h4>
                                </div>
                                <a href="{{ auth()->check() ? route('investments.show', $property->id) : route('login') }}" class="btn btn-success w-100">Make Offer</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- EARN Section -->
    <section class="earn-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="section-label">EARN</span>
                    <h2 class="section-title">Collect passive income without tenant hassle.</h2>
                    <p class="section-description">No late night phone calls. Our experts cover maintenance, renewals, and everything in between so you can just focus on earning.</p>
                </div>
                <div class="col-lg-6">
                    <div class="dividend-card">
                        <div class="dividend-header">
                            <span>Dividends + Interest</span>
                            <span class="arrow">→</span>
                        </div>
                        <div class="dividend-amount">$546.67</div>
                        <div class="dividend-label">Total Dividends + Interest</div>
                        <div class="dividend-chart">
                            <svg viewBox="0 0 100 50" class="chart-svg">
                                <polyline points="0,45 20,35 40,30 60,20 80,25 100,15" fill="none" stroke="#2563eb" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="dividend-bottom">
                            <div>
                                <div class="bottom-amount">6.4%</div>
                                <div class="bottom-label">Annualized Yield</div>
                            </div>
                            <div>
                                <div class="bottom-date">By Jan 31, 2026</div>
                                <div class="bottom-label">Next Dividend Date</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse Section -->
    <section class="browse-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="section-label">BROWSE</span>
                    <h2 class="section-title">Handpick investments that fit your goals.</h2>
                </div>
                <div class="col-lg-6">
                    <h3 class="browse-subtitle">Real estate investing, reimagined.</h3>
                </div>
            </div>
            <div class="blue-banner">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="property-card-blue">
                            <img src="images/hero-property.jpg" alt="Property">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="property-card-blue">
                            <img src="images/brick-house.jpg" alt="Property">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="property-card-blue">
                            <img src="images/modern-house.jpg" alt="Property">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App CTA Section -->
    <section class="mobile-cta-section">
        <div class="mobile-banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="mobile-banner-title">Ready to join 933K+ investors building their real estate portfolios?</h2>
                    </div>
                    <div class="col-lg-6 text-center">
                        <a href="{{ route('invest.public') }}" class="btn-browse-white" style="text-decoration: none; display: inline-block;">BROWSE AVAILABLE PROPERTIES</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Section -->
    <section class="mobile-app-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="phone-mockup">
                        <div class="phone-frame">
                            <img src="images/us-map.jpg" alt="Portfolio app screenshot">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="section-label">INVEST</span>
                    <div class="section-title-with-icon">
                        <span class="blue-icon">O</span>
                        <h2>Own real estate in minutes, not months.</h2>
                    </div>
                    <p class="section-description">Securely link your bank account and start investing in minutes. Think online shopping, not traditional real estate paperwork.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="faq-title">Everything you need to feel right at home before you get started.</h2>
                    <p class="faq-subtitle">To learn more about EMAAR Properties Assets, read about us or visit the help center.</p>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Who can invest in EMAAR Properties Assets?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Accredited and non-accredited investors in the United States can invest in EMAAR Properties Assets properties.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    How much can I invest?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can invest as little as $100 per property with no maximum limits.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What type of products are available on EMAAR Properties Assets?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer residential rental homes, ranging from single-family homes to multi-unit properties.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    What returns can I obtain?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Returns vary by property but typically range from 6-12% annually including dividends and appreciation.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    What liquidity options are available?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can sell your shares on our secondary market anytime, or hold until the property is sold.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SELL Section -->
    <section class="sell-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="sell-transactions">
                        <div class="transaction-card">
                            <div class="transaction-image">
                                <img src="images/brick-house.jpg" alt="The Chelsea">
                            </div>
                            <div class="transaction-info">
                                <div class="transaction-title">The Chelsea Q1 2026</div>
                                <div class="transaction-detail">Someone bought 19 shares at 9.00/share</div>
                            </div>
                        </div>
                        <div class="transaction-card">
                            <div class="transaction-image">
                                <img src="images/modern-house.jpg" alt="The Plumtree">
                            </div>
                            <div class="transaction-info">
                                <div class="transaction-title">The Plumtree Q1 2026</div>
                                <div class="transaction-detail">Someone bought 150 shares at $17.25/share</div>
                            </div>
                        </div>
                        <div class="transaction-card">
                            <div class="transaction-image">
                                <img src="images/hero-property.jpg" alt="The Roseberry">
                            </div>
                            <div class="transaction-info">
                                <div class="transaction-title">The Roseberry Q1 2026</div>
                                <div class="transaction-detail">Someone bought 94 shares at $10.50/share</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="section-label">SELL</span>
                    <h2 class="section-title">Access liquidity when you need it.</h2>
                    <p class="section-description">Hold your shares until our team sells the property, or choose to exit early by selling to other EMAAR Properties Assets investors.</p>
                </div>
            </div>
        </div>
    </section>
@include('home.footer')