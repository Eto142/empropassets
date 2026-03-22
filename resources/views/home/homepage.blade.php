@include('home.header')

<link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}">
<div id="hp-root">

{{-- ═══════════════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-hero">
    <div class="hp-hero__overlay"></div>
    <div class="container hp-hero__inner">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="hp-pill mb-3">Dubai's #1 Real Estate Investment Platform</span>
                <h1 class="hp-hero__title">Own a Piece of Dubai's Most Iconic Properties</h1>
                <p class="hp-hero__sub">Fractional real estate investing, starting from $500. Earn monthly rental income and capital appreciation from premium Dubai properties  without the hassle of ownership.</p>
                <div class="hp-hero__ctas">
                    <a href="{{ route('show.register') }}" class="hp-btn hp-btn--gold">Start Investing Today</a>
                    <a href="{{ route('invest.public') }}"  class="hp-btn hp-btn--outline">Browse Properties</a>
                </div>
                <div class="hp-hero__trust">
                    <div class="hp-trust-item"><span class="hp-trust-num">933K+</span><span class="hp-trust-label">Registered Investors</span></div>
                    <div class="hp-trust-divider"></div>
                    <div class="hp-trust-item"><span class="hp-trust-num">$366M+</span><span class="hp-trust-label">Total Invested</span></div>
                    <div class="hp-trust-divider"></div>
                    <div class="hp-trust-item"><span class="hp-trust-num">8.5%</span><span class="hp-trust-label">Avg. Annual Yield</span></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hp-hero__cards">
                    <div class="hp-hero__card hp-hero__card--main">
                        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=600&q=80" alt="Downtown Dubai">
                        <div class="hp-hero__card-badge"><span class="hp-badge-dot"></span>Live Returns 8.5% p.a.</div>
                    </div>
                    <div class="hp-hero__card hp-hero__card--sm hp-hero__card--sm1">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=400&q=80" alt="Palm Jumeirah Villa">
                        <div class="hp-hero__card-label">Palm Jumeirah Villa</div>
                    </div>
                    <div class="hp-hero__card hp-hero__card--sm hp-hero__card--sm2">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=400&q=80" alt="Dubai Marina">
                        <div class="hp-hero__card-label">Dubai Marina</div>
                    </div>
                    <div class="hp-portfolio-chip">
                        <div class="hp-portfolio-chip__icon">📈</div>
                        <div>
                            <div class="hp-portfolio-chip__val">+$12,480</div>
                            <div class="hp-portfolio-chip__label">Portfolio Growth This Year</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     LIVE TICKER
═══════════════════════════════════════════════════════════════ --}}
<div class="hp-ticker">
    <div class="hp-ticker__label">LIVE MARKET</div>
    <div class="hp-ticker__track">
        <div class="hp-ticker__inner" id="tickerInner">
            @php
            $tickers = [
                ['name'=>'Burj Vista Residences',     'price'=>'$850', 'pct'=>'+9.2%'],
                ['name'=>'Palm Jumeirah Villa',        'price'=>'$1,800','pct'=>'+7.2%'],
                ['name'=>'DIFC Boulevard',             'price'=>'$1,100','pct'=>'+11.4%'],
                ['name'=>'JBR Ocean Heights',          'price'=>'$560', 'pct'=>'+10.0%'],
                ['name'=>'Business Bay Canal',         'price'=>'$620', 'pct'=>'+8.8%'],
                ['name'=>'Dubai Creek Harbour',        'price'=>'$710', 'pct'=>'+9.3%'],
                ['name'=>'Emaar Beachfront',           'price'=>'$480', 'pct'=>'+9.0%'],
                ['name'=>'Four Seasons DIFC',          'price'=>'$950', 'pct'=>'+7.6%'],
                ['name'=>'Arabian Ranches III',        'price'=>'$380', 'pct'=>'+7.5%'],
                ['name'=>'Kempinski Palm',             'price'=>'$680', 'pct'=>'+8.7%'],
            ];
            @endphp
            @foreach(array_merge($tickers, $tickers) as $t)
            <div class="hp-ticker__item">
                <span class="hp-ticker__name">{{ $t['name'] }}</span>
                <span class="hp-ticker__price">{{ $t['price'] }}/share</span>
                <span class="hp-ticker__pct hp-ticker__pct--up">{{ $t['pct'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     STATS STRIP
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-stats">
    <div class="container">
        <div class="hp-stats__grid">
            <div class="hp-stats__item">
                <div class="hp-stats__num" data-count="366">$0M+</div>
                <div class="hp-stats__label">Total Assets Under Management</div>
            </div>
            <div class="hp-stats__item">
                <div class="hp-stats__num" data-count="59">$0M</div>
                <div class="hp-stats__label">Distributed to Investors</div>
            </div>
            <div class="hp-stats__item">
                <div class="hp-stats__num" data-count="933">0K+</div>
                <div class="hp-stats__label">Registered Investors Worldwide</div>
            </div>
            <div class="hp-stats__item">
                <div class="hp-stats__num">40+</div>
                <div class="hp-stats__label">Premium Dubai Properties</div>
            </div>
            <div class="hp-stats__item">
                <div class="hp-stats__num">4.9 ★</div>
                <div class="hp-stats__label">Investor Satisfaction Score</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     HOW IT WORKS
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-section hp-hiw">
    <div class="container">
        <div class="hp-section__hd text-center mb-5">
            <span class="hp-eyebrow">Simple Process</span>
            <h2 class="hp-section__title">Start Earning in 3 Simple Steps</h2>
            <p class="hp-section__sub">No property management headaches. No massive capital required. Just smart, diversified real estate income.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="hp-hiw__card">
                    <div class="hp-hiw__num">01</div>
                    <div class="hp-hiw__icon">🏦</div>
                    <h4>Create & Fund Your Account</h4>
                    <p>Sign up in minutes, verify your identity, and fund your account securely. Invest from as little as $500.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hp-hiw__card hp-hiw__card--featured">
                    <div class="hp-hiw__num">02</div>
                    <div class="hp-hiw__icon">🏙️</div>
                    <h4>Choose Your Properties</h4>
                    <p>Browse curated Dubai investments  from Palm Jumeirah villas to Downtown apartments  and build your portfolio.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hp-hiw__card">
                    <div class="hp-hiw__num">03</div>
                    <div class="hp-hiw__icon">💰</div>
                    <h4>Collect Monthly Income</h4>
                    <p>Receive rental dividends every month directly to your account. Watch your portfolio grow with capital appreciation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     FEATURED INVESTMENT PROPERTIES
═══════════════════════════════════════════════════════════════ --}}
@if($featuredInvestments->count() > 0)
<section class="hp-section hp-properties" id="investments">
    <div class="container">
        <div class="hp-section__hd d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3">
            <div>
                <span class="hp-eyebrow">Monthly Income</span>
                <h2 class="hp-section__title mb-1">Investment Opportunities</h2>
                <p class="hp-section__sub mb-0">Earn rental dividends from Dubai's finest properties</p>
            </div>
            <a href="{{ route('invest.public', ['listing' => 'investment']) }}" class="hp-btn hp-btn--ghost">View All Properties →</a>
        </div>
        <div class="row g-4">
            @foreach($featuredInvestments as $property)
            <div class="col-md-6 col-lg-4">
                <div class="hp-prop-card">
                    <div class="hp-prop-card__img-wrap">
                        <img src="{{ $property->image ?? asset('assets/images/placeholder.png') }}" alt="{{ $property->name }}">
                        <span class="hp-prop-badge hp-prop-badge--invest">Investment</span>
                        <span class="hp-prop-yield">{{ $property->historic_yield }}% yield</span>
                    </div>
                    <div class="hp-prop-card__body">
                        <div class="hp-prop-card__location"><i class="bi bi-geo-alt-fill"></i> {{ $property->location }}</div>
                        <h5 class="hp-prop-card__name">{{ $property->name }}</h5>
                        <div class="hp-prop-card__stats">
                            <div class="hp-prop-stat">
                                <div class="hp-prop-stat__val">${{ number_format($property->total_assets) }}</div>
                                <div class="hp-prop-stat__lbl">Total Assets</div>
                            </div>
                            <div class="hp-prop-stat">
                                <div class="hp-prop-stat__val">${{ number_format($property->min_investment) }}</div>
                                <div class="hp-prop-stat__lbl">Min. Investment</div>
                            </div>
                            <div class="hp-prop-stat">
                                <div class="hp-prop-stat__val">{{ number_format($property->investors) }}</div>
                                <div class="hp-prop-stat__lbl">Investors</div>
                            </div>
                        </div>
                        <a href="{{ auth()->check() ? route('investments.show', $property->id) : route('show.register') }}" class="hp-prop-card__cta">Invest Now →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════════
     FEATURED FOR SALE
═══════════════════════════════════════════════════════════════ --}}
@if($featuredForSale->count() > 0)
<section class="hp-section hp-forsale">
    <div class="container">
        <div class="hp-section__hd d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3">
            <div>
                <span class="hp-eyebrow">Direct Ownership</span>
                <h2 class="hp-section__title mb-1">Properties For Sale</h2>
                <p class="hp-section__sub mb-0">Own premium Dubai real estate outright</p>
            </div>
            <a href="{{ route('invest.public', ['listing' => 'for_sale']) }}" class="hp-btn hp-btn--ghost">View All →</a>
        </div>
        <div class="row g-4">
            @foreach($featuredForSale as $property)
            <div class="col-md-6 col-lg-4">
                <div class="hp-prop-card hp-prop-card--sale">
                    <div class="hp-prop-card__img-wrap">
                        <img src="{{ $property->image ?? asset('assets/images/placeholder.png') }}" alt="{{ $property->name }}">
                        <span class="hp-prop-badge hp-prop-badge--sale">For Sale</span>
                    </div>
                    <div class="hp-prop-card__body">
                        <div class="hp-prop-card__location"><i class="bi bi-geo-alt-fill"></i> {{ $property->location }}</div>
                        <h5 class="hp-prop-card__name">{{ $property->name }}</h5>
                        <div class="hp-prop-card__meta">
                            @if($property->bedrooms) <span><i class="bi bi-door-open"></i> {{ $property->bedrooms }} Bed</span> @endif
                            @if($property->bathrooms) <span><i class="bi bi-droplet"></i> {{ $property->bathrooms }} Bath</span> @endif
                            @if($property->size) <span><i class="bi bi-arrows-fullscreen"></i> {{ number_format($property->size) }} sqft</span> @endif
                        </div>
                        <div class="hp-prop-card__price">${{ number_format($property->sale_price ?? 0) }}</div>
                        <a href="{{ auth()->check() ? route('investments.show', $property->id) : route('show.register') }}" class="hp-prop-card__cta hp-prop-card__cta--sale">Make an Enquiry →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════════════════════════════════════════════
     WHY CHOOSE US
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-section hp-why">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <span class="hp-eyebrow">Why EmProp Assets</span>
                <h2 class="hp-section__title">Real Estate Investing Designed for the Modern Investor</h2>
                <p class="hp-section__sub">We combine the stability of bricks-and-mortar with the flexibility of digital investing. Every property is rigorously vetted by our team of Dubai property experts.</p>
                <a href="{{ route('show.register') }}" class="hp-btn hp-btn--primary mt-3">Open Free Account</a>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="hp-feat">
                            <div class="hp-feat__icon">🏛️</div>
                            <h5>Regulated & Compliant</h5>
                            <p>Fully compliant with UAE real estate regulations and international investment standards.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hp-feat">
                            <div class="hp-feat__icon">📊</div>
                            <h5>Real-Time Dashboard</h5>
                            <p>Monitor portfolio performance, dividends, and property valuations 24/7 from any device.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hp-feat">
                            <div class="hp-feat__icon">💎</div>
                            <h5>Premium Properties Only</h5>
                            <p>Every listing passes our 40-point vetting checklist before it reaches our investors.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hp-feat">
                            <div class="hp-feat__icon">🔄</div>
                            <h5>Exit Anytime</h5>
                            <p>Sell your shares on our secondary market or wait for the property sale  your choice.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hp-feat">
                            <div class="hp-feat__icon">🌍</div>
                            <h5>Global Access</h5>
                            <p>Investors from 60+ countries already trust us. USD-denominated returns, no currency risk.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="hp-feat">
                            <div class="hp-feat__icon">🛡️</div>
                            <h5>Asset-Backed Security</h5>
                            <p>Your investment is always backed by a real, title-deeded Dubai property  not a promise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     EARN PASSIVE INCOME VISUAL
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-section hp-earn">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <span class="hp-eyebrow">Passive Income</span>
                <h2 class="hp-section__title">Collect Rent Without Being a Landlord</h2>
                <p class="hp-section__sub">No tenant calls. No maintenance bills. No paperwork. Our in-house property management team handles everything  you just receive your monthly dividend.</p>
                <ul class="hp-checklist">
                    <li>Monthly rental income deposited directly to your account</li>
                    <li>Professional property management across all listings</li>
                    <li>Transparent fee structure  no hidden costs</li>
                    <li>Annual capital appreciation on top of rental yield</li>
                </ul>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="hp-earn__card">
                    <div class="hp-earn__card-hd">
                        <span>My Portfolio</span>
                        <span class="hp-earn__card-period">March 2026</span>
                    </div>
                    <div class="hp-earn__card-total">$546.67</div>
                    <div class="hp-earn__card-sub">Dividends received this month</div>
                    <div class="hp-earn__chart-wrap">
                        <svg viewBox="0 0 300 80" preserveAspectRatio="none" class="hp-earn__chart">
                            <defs>
                                <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#c9a96e" stop-opacity="0.3"/>
                                    <stop offset="100%" stop-color="#c9a96e" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                            <path d="M0,70 C30,60 60,50 90,45 C120,40 150,35 180,28 C210,22 240,30 270,18 L300,12 L300,80 L0,80 Z" fill="url(#chartGrad)"/>
                            <path d="M0,70 C30,60 60,50 90,45 C120,40 150,35 180,28 C210,22 240,30 270,18 L300,12" fill="none" stroke="#c9a96e" stroke-width="2.5"/>
                        </svg>
                    </div>
                    <div class="hp-earn__card-stats">
                        <div class="hp-earn__card-stat">
                            <div class="hp-earn__card-stat-val hp-text-gold">6.4%</div>
                            <div class="hp-earn__card-stat-lbl">Annualised Yield</div>
                        </div>
                        <div class="hp-earn__card-stat">
                            <div class="hp-earn__card-stat-val">Mar 31</div>
                            <div class="hp-earn__card-stat-lbl">Next Dividend</div>
                        </div>
                        <div class="hp-earn__card-stat">
                            <div class="hp-earn__card-stat-val hp-text-green">+$12,480</div>
                            <div class="hp-earn__card-stat-lbl">Capital Growth</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-section hp-testimonials">
    <div class="container">
        <div class="hp-section__hd text-center mb-5">
            <span class="hp-eyebrow">Investor Stories</span>
            <h2 class="hp-section__title">Trusted by Investors Worldwide</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="hp-testi">
                    <div class="hp-testi__stars">★★★★★</div>
                    <p class="hp-testi__body">"I started with $5,000 in a Dubai Marina apartment and within 12 months I'd received $450 in rental dividends plus my share value had grown 11%. The platform is incredibly transparent."</p>
                    <div class="hp-testi__author">
                        <div class="hp-testi__avatar">JM</div>
                        <div>
                            <div class="hp-testi__name">James M.</div>
                            <div class="hp-testi__meta">London, UK · Investor since 2023</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hp-testi hp-testi--featured">
                    <div class="hp-testi__stars">★★★★★</div>
                    <p class="hp-testi__body">"Having tried other real estate crowdfunding platforms, EmProp Assets is in a class of its own. The properties are genuinely premium, the Dubai market is booming, and the team responds within hours."</p>
                    <div class="hp-testi__author">
                        <div class="hp-testi__avatar">SA</div>
                        <div>
                            <div class="hp-testi__name">Sarah A.</div>
                            <div class="hp-testi__meta">Dubai, UAE · Investor since 2022</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hp-testi">
                    <div class="hp-testi__stars">★★★★★</div>
                    <p class="hp-testi__body">"Living in Dubai, I know how competitive this market is. EmProp Assets gave me fractional access to Downtown properties I could never afford outright. Best investment decision I've made."</p>
                    <div class="hp-testi__author">
                        <div class="hp-testi__avatar">KA</div>
                        <div>
                            <div class="hp-testi__name">Khalid A.</div>
                            <div class="hp-testi__meta">Dubai, UAE · Investor since 2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     AS SEEN IN
═══════════════════════════════════════════════════════════════ --}}
<div class="hp-press">
    <div class="container">
        <div class="hp-press__inner">
            <span class="hp-press__label">AS SEEN IN</span>
            <div class="hp-press__logos">
                <span>Bloomberg</span>
                <span>Yahoo! Finance</span>
                <span>Business Insider</span>
                <span>The Wall Street Journal</span>
                <span>TechCrunch</span>
                <span>Forbes</span>
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     FAQ
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-section hp-faq">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-5">
                <span class="hp-eyebrow">Got Questions?</span>
                <h2 class="hp-section__title">Everything you need to know before investing</h2>
                <p class="hp-section__sub">Have more questions? Our investor relations team is available 7 days a week.</p>
                <a href="{{ route('show.register') }}" class="hp-btn hp-btn--primary mt-3">Talk to an Advisor</a>
            </div>
            <div class="col-lg-7">
                <div class="accordion hp-accordion" id="faqAccordion">
                    @php
                    $faqs = [
                        ['q'=>'Who can invest with EmProp Assets?','a'=>'Anyone aged 18+ from over 60 countries can invest. No prior real estate experience is needed. Both new and experienced investors are welcome.'],
                        ['q'=>'What is the minimum investment amount?','a'=>'You can start with as little as $500 per property. There is no upper limit, and you can diversify across multiple properties simultaneously.'],
                        ['q'=>'How and when are dividends paid?','a'=>'Rental dividends are distributed monthly, directly to your EmProp Assets wallet. You can reinvest them or withdraw to your bank account at any time.'],
                        ['q'=>'What happens if I want to exit early?','a'=>'You can list your shares on our secondary marketplace to sell to other investors at any time, providing liquidity well before a property sale event.'],
                        ['q'=>'Are the properties actually in Dubai?','a'=>'Yes  every listing on our platform is a real, title-deeded property in Dubai, UAE. We publish full legal documentation and professional valuations for each one.'],
                        ['q'=>'What returns can I realistically expect?','a'=>'Our portfolio delivers an average rental yield of 7–10% per annum, plus capital appreciation of 8–15% historically across our Dubai holdings.'],
                    ];
                    @endphp
                    @foreach($faqs as $i => $faq)
                    <div class="accordion-item hp-accordion__item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}">
                                {{ $faq['q'] }}
                            </button>
                        </h2>
                        <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">{{ $faq['a'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     FINAL CTA BANNER
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-cta-banner">
    <div class="hp-cta-banner__bg"></div>
    <div class="container hp-cta-banner__inner text-center">
        <h2 class="hp-cta-banner__title">Ready to Build Real Wealth Through Dubai Real Estate?</h2>
        <p class="hp-cta-banner__sub">Join over 933,000 investors already earning passive income from the world's most dynamic property market.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
            <a href="{{ route('show.register') }}" class="hp-btn hp-btn--gold hp-btn--lg">Create Free Account</a>
            <a href="{{ route('invest.public') }}"  class="hp-btn hp-btn--outline-white hp-btn--lg">Browse Properties</a>
        </div>
        <div class="hp-cta-banner__note mt-4">No fees to join · Start from $500 · Exit anytime</div>
    </div>
</section>

{{-- ─── Scroll reveal ──────────────────────────────────────────────── --}}
<script>
(function () {
    if (!('IntersectionObserver' in window)) return;
    const els = document.querySelectorAll('.hp-prop-card, .hp-hiw__card, .hp-feat, .hp-testi, .hp-stats__item, .hp-section__hd, .hp-earn__card');
    els.forEach((el, i) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = `opacity .55s ease ${(i % 4) * 80}ms, transform .55s ease ${(i % 4) * 80}ms`;
    });
    const io = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.style.opacity = '1';
                e.target.style.transform = 'none';
                io.unobserve(e.target);
            }
        });
    }, { threshold: 0.1 });
    els.forEach(el => io.observe(el));
})();
</script>


{{-- ═══════════════════════════════════════════════════════════════
     PORTFOLIO MAP SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="hp-section hp-portfolio-map">
    <div class="container">
        <div class="text-center mb-5">
            <span class="hp-eyebrow">502+ Properties</span>
            <h2 class="hp-section__title">Build a diversified real estate portfolio<br>with 502+ properties across the UAE.</h2>
            <p class="hp-section__sub mx-auto mb-4">Our properties span every major emirate and city district  giving you true geographical diversification in one of the world's most dynamic markets.</p>
            <a href="{{ route('invest.public') }}" class="hp-btn hp-btn--gold hp-btn--lg">BROWSE AVAILABLE PROPERTIES</a>
        </div>
        <div class="hp-map-wrap">
            <img src="{{ asset('images/us-map.jpg') }}" alt="Property Distribution Map" class="hp-map-img">
        </div>
        <div class="row g-4 mt-5">
            <div class="col-6 col-md-3 text-center hp-map-stat">
                <div class="hp-map-stat__city">Dubai</div>
                <div class="hp-map-stat__count">340+ properties</div>
            </div>
            <div class="col-6 col-md-3 text-center hp-map-stat">
                <div class="hp-map-stat__city">Abu Dhabi</div>
                <div class="hp-map-stat__count">80+ properties</div>
            </div>
            <div class="col-6 col-md-3 text-center hp-map-stat">
                <div class="hp-map-stat__city">Sharjah</div>
                <div class="hp-map-stat__count">50+ properties</div>
            </div>
            <div class="col-6 col-md-3 text-center hp-map-stat">
                <div class="hp-map-stat__city">Ras Al Khaimah</div>
                <div class="hp-map-stat__count">30+ properties</div>
            </div>
        </div>
    </div>
</section>

</div>{{-- #hp-root --}}

@include('home.footer')