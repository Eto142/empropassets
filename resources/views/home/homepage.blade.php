@include('home.header')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="hero-title">Buy, sell, & own shares of real estate.</h1>
                    <p class="hero-subtitle">Access monthly cash flow and appreciation potential without the work.</p>
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
        </div>
    </section>

    <!-- Returns Section -->
    <section class="returns-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8">
                    <h2 class="returns-title">$50M+ in consistent returns distributed to investors</h2>
                    <p class="returns-subtitle">Our track record shows steady returns through monthly dividends as well as appreciation from opportunistic property sales and secondary market trading.</p>
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
                    <p>Apple App Store</p>
                </div>
            </div>

            <div class="investment-properties">
                <div class="property-item">
                    <h4>THE CUPCAKE</h4>
                    <p>$16.21 ↑ 62.1%</p>
                </div>
                <div class="property-item">
                    <h4>THE WENTWORTH</h4>
                    <p>$15.55 ↑ 55.5%</p>
                </div>
                <div class="property-item">
                    <h4>THE MOJAVE</h4>
                    <p>$15.70 ↑ 57%</p>
                </div>
                <div class="property-item">
                    <h4>THE CENTENNIAL</h4>
                    <p>$12.02 ↑ 20.2%</p>
                </div>
                <div class="property-item">
                    <h4>THE EASTFAIR</h4>
                    <p>Coming Soon</p>
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