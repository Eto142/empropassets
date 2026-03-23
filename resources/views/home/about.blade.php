@include('home.header')

<style>
.about-hero { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 60%, #0f172a 100%); padding: 110px 0 80px; color: #fff; position: relative; overflow: hidden; }
.about-hero::before { content:''; position:absolute; inset:0; background: radial-gradient(ellipse at 20% 60%, rgba(37,99,235,.18) 0%, transparent 55%), radial-gradient(ellipse at 80% 30%, rgba(5,150,105,.1) 0%, transparent 55%); }
.about-hero__inner { position:relative; z-index:2; }
.about-eyebrow { display:inline-block; background:rgba(37,99,235,.18); color:#93c5fd; font-size:11px; font-weight:800; letter-spacing:2px; text-transform:uppercase; border:1px solid rgba(147,197,253,.25); border-radius:100px; padding:6px 14px; margin-bottom:20px; }
.about-hero h1 { font-size: clamp(36px, 5vw, 64px); font-weight:900; line-height:1.1; margin-bottom:20px; }
.about-hero p  { font-size:18px; opacity:.8; max-width:600px; line-height:1.75; }

.about-stat-bar { background:#fff; border-bottom:1px solid #e5e7eb; padding:36px 0; }
.about-stat-bar__grid { display:grid; grid-template-columns:repeat(4,1fr); }
.about-stat-bar__item { text-align:center; padding:16px 10px; border-right:1px solid #e5e7eb; }
.about-stat-bar__item:last-child { border-right:none; }
.about-stat-bar__num { font-size:clamp(26px,3vw,40px); font-weight:900; color:#2563eb; line-height:1; margin-bottom:6px; }
.about-stat-bar__lbl { font-size:12px; color:#666; letter-spacing:.5px; line-height:1.4; }

.about-section { padding:88px 0; }
.about-section--gray { background:#f8fafc; }
.about-section--dark { background:#0f172a; }

.about-tag { display:inline-block; font-size:11px; font-weight:800; letter-spacing:2px; text-transform:uppercase; color:#2563eb; background:#eff6ff; padding:5px 12px; border-radius:100px; margin-bottom:14px; }
.about-h2  { font-size:clamp(28px,3.5vw,42px); font-weight:900; color:#0f172a; line-height:1.15; margin-bottom:16px; }
.about-p   { font-size:16px; color:#555; line-height:1.8; margin-bottom:16px; }
.about-h2--white { color:#fff; }
.about-p--white  { color:rgba(255,255,255,.7); }

.about-value { display:flex; gap:16px; margin-bottom:28px; align-items:flex-start; }
.about-value__icon { font-size:26px; flex-shrink:0; margin-top:2px; }
.about-value__title { font-size:16px; font-weight:700; color:#0f172a; margin-bottom:4px; }
.about-value__text  { font-size:14px; color:#666; line-height:1.65; margin:0; }

.about-timeline { list-style:none; padding:0; margin:0; position:relative; }
.about-timeline::before { content:''; position:absolute; left:17px; top:0; bottom:0; width:2px; background:#dbeafe; }
.about-timeline__item { display:flex; gap:20px; margin-bottom:36px; position:relative; }
.about-timeline__dot  { width:36px; height:36px; border-radius:50%; background:#2563eb; color:#fff; font-size:12px; font-weight:800; display:flex; align-items:center; justify-content:center; flex-shrink:0; z-index:1; }
.about-timeline__year { font-size:13px; font-weight:800; color:#2563eb; margin-bottom:4px; }
.about-timeline__title{ font-size:15px; font-weight:700; color:#0f172a; margin-bottom:4px; }
.about-timeline__text { font-size:13px; color:#666; line-height:1.65; margin:0; }

.about-team-card { background:#fff; border-radius:14px; padding:28px 22px; text-align:center; box-shadow:0 4px 18px rgba(15,23,42,.07); border:1px solid #e5e7eb; transition:transform .3s, box-shadow .3s; height:100%; }
.about-team-card:hover { transform:translateY(-5px); box-shadow:0 16px 40px rgba(15,23,42,.12); }
.about-team-card__avatar { width:88px; height:88px; border-radius:50%; background:linear-gradient(135deg,#2563eb 0%,#1e40af 100%); color:#fff; font-size:28px; font-weight:900; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; }
.about-team-card__name  { font-size:17px; font-weight:800; color:#0f172a; margin-bottom:4px; }
.about-team-card__role  { font-size:13px; color:#2563eb; font-weight:600; margin-bottom:8px; }
.about-team-card__bio   { font-size:12px; color:#888; line-height:1.6; margin:0; }

.about-reg-card { background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.1); border-radius:14px; padding:28px 24px; }
.about-reg-card__icon  { font-size:32px; margin-bottom:14px; }
.about-reg-card__title { font-size:16px; font-weight:700; color:#fff; margin-bottom:8px; }
.about-reg-card__text  { font-size:13px; color:rgba(255,255,255,.6); line-height:1.65; margin:0; }

.about-cta { background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 50%,#0f172a 100%); padding:90px 0; text-align:center; }
.about-cta h2 { font-size:clamp(28px,4vw,46px); font-weight:900; color:#fff; margin-bottom:16px; }
.about-cta p  { font-size:17px; color:rgba(255,255,255,.65); max-width:500px; margin:0 auto 36px; line-height:1.7; }
.about-btn { display:inline-flex; align-items:center; justify-content:center; padding:14px 32px; border-radius:8px; font-weight:700; font-size:15px; letter-spacing:.3px; cursor:pointer; border:2px solid transparent; text-decoration:none; transition:transform .2s, background .2s; }
.about-btn:hover { transform:translateY(-2px); }
.about-btn--gold  { background:#000; color:#fff; }
.about-btn--gold:hover { background:#222; color:#fff; }
.about-btn--outline { background:transparent; border-color:rgba(255,255,255,.6); color:#fff; }
.about-btn--outline:hover { background:rgba(255,255,255,.1); color:#fff; }

@media (max-width:767px) {
    .about-stat-bar__grid { grid-template-columns:repeat(2,1fr); }
    .about-stat-bar__item:nth-child(2) { border-right:none; }
    .about-stat-bar__item:nth-child(3) { border-right:none; }
    .about-section { padding:60px 0; }
}
@media (max-width:480px) {
    .about-stat-bar__grid { grid-template-columns:1fr 1fr; }
    .about-cta .d-flex { flex-direction:column; align-items:stretch; }
    .about-btn { width:100%; justify-content:center; }
}
</style>

{{-- ── HERO ── --}}
<section class="about-hero">
    <div class="container about-hero__inner">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <span class="about-eyebrow">Established in Dubai, UAE</span>
                <h1>Democratising Dubai Real Estate — For Every Investor, Everywhere</h1>
                <p>EmProp Assets is Dubai's leading fractional property investment platform. We give investors worldwide direct, title-backed access to the UAE's most sought-after real estate — starting from just $500.</p>
            </div>
        </div>
    </div>
</section>

{{-- ── STATS BAR ── --}}
<div class="about-stat-bar">
    <div class="container">
        <div class="about-stat-bar__grid">
            <div class="about-stat-bar__item">
                <div class="about-stat-bar__num">$366M+</div>
                <div class="about-stat-bar__lbl">Assets Under Management</div>
            </div>
            <div class="about-stat-bar__item">
                <div class="about-stat-bar__num">933K+</div>
                <div class="about-stat-bar__lbl">Registered Investors Worldwide</div>
            </div>
            <div class="about-stat-bar__item">
                <div class="about-stat-bar__num">40+</div>
                <div class="about-stat-bar__lbl">Premium Dubai Properties</div>
            </div>
            <div class="about-stat-bar__item">
                <div class="about-stat-bar__num">8.5%</div>
                <div class="about-stat-bar__lbl">Avg. Annual Rental Yield</div>
            </div>
        </div>
    </div>
</div>

{{-- ── MISSION ── --}}
<section class="about-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6">
                <span class="about-tag">Our Mission</span>
                <h2 class="about-h2">Making Dubai Real Estate Accessible to the World</h2>
                <p class="about-p">Dubai's property market is one of the world's highest-yielding and fastest-appreciating. Yet for decades, it was the exclusive domain of ultra-high-net-worth individuals and institutional investors. EmProp Assets was founded to change that.</p>
                <p class="about-p">Through fractional ownership technology, we divide premium Dubai properties into affordable shares — so anyone, anywhere, can invest from $500, collect monthly rental dividends, and benefit from capital appreciation without ever dealing with tenants, maintenance, or ownership paperwork.</p>
                <p class="about-p">We are headquartered in the Dubai International Financial Centre (DIFC) and operate under a framework fully compliant with UAE Real Estate Regulatory Agency (RERA) guidelines and international investor protection standards.</p>
            </div>
            <div class="col-lg-6">
                <div style="background:#f8fafc; border-radius:16px; padding:36px; border:1px solid #e5e7eb;">
                    <h3 style="font-size:22px; font-weight:800; color:#0f172a; margin-bottom:28px;">What We Stand For</h3>
                    <div class="about-value">
                        <div class="about-value__icon">🏛️</div>
                        <div>
                            <div class="about-value__title">Transparency First</div>
                            <p class="about-value__text">Every property listing includes full legal documentation, independent valuations, historic rental data, and real-time performance reporting. No surprises, no hidden fees.</p>
                        </div>
                    </div>
                    <div class="about-value">
                        <div class="about-value__icon">🌍</div>
                        <div>
                            <div class="about-value__title">Global Accessibility</div>
                            <p class="about-value__text">Investors from 60+ countries have joined our platform. All returns are denominated in USD, removing currency risk for international investors.</p>
                        </div>
                    </div>
                    <div class="about-value">
                        <div class="about-value__icon">🛡️</div>
                        <div>
                            <div class="about-value__title">Asset-Backed Security</div>
                            <p class="about-value__text">Your investment is always backed by a real, title-deeded Dubai property registered with the Dubai Land Department — not a promise or a fund unit.</p>
                        </div>
                    </div>
                    <div class="about-value">
                        <div class="about-value__icon">🔄</div>
                        <div>
                            <div class="about-value__title">Liquidity & Flexibility</div>
                            <p class="about-value__text">Sell your shares on our secondary marketplace at any time. You always remain in control of your capital and exit timing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── OUR STORY ── --}}
<section class="about-section about-section--gray">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <span class="about-tag">Our Journey</span>
                <h2 class="about-h2">From a Dubai Office to a Global Platform</h2>
                <p class="about-p" style="margin:0 auto;">Built by property professionals and fintech engineers who saw the gap between Dubai's booming market and the lack of accessible investment routes for retail investors.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <ul class="about-timeline">
                    <li class="about-timeline__item">
                        <div class="about-timeline__dot">1</div>
                        <div>
                            <div class="about-timeline__year">2019 — Founded</div>
                            <div class="about-timeline__title">EmProp Assets established in DIFC, Dubai</div>
                            <p class="about-timeline__text">A team of 8 real estate and fintech professionals incorporated EmProp Assets in the Dubai International Financial Centre with a clear mandate: give retail investors access to Dubai's property market.</p>
                        </div>
                    </li>
                    <li class="about-timeline__item">
                        <div class="about-timeline__dot">2</div>
                        <div>
                            <div class="about-timeline__year">2020 — First Properties</div>
                            <div class="about-timeline__title">Launched with 3 Downtown Dubai apartments</div>
                            <p class="about-timeline__text">Our first three fractional listings — all in the Burj Vista tower in Downtown Dubai — sold out in under 72 hours, validating demand for our model in the market.</p>
                        </div>
                    </li>
                    <li class="about-timeline__item">
                        <div class="about-timeline__dot">3</div>
                        <div>
                            <div class="about-timeline__year">2021 — International Expansion</div>
                            <div class="about-timeline__title">Opened to investors in 60+ countries</div>
                            <p class="about-timeline__text">After obtaining relevant regulatory approvals, we opened the platform internationally. Investors from the UK, Europe, USA, India, and Southeast Asia joined within the first quarter, with all dividends paid in USD.</p>
                        </div>
                    </li>
                    <li class="about-timeline__item">
                        <div class="about-timeline__dot">4</div>
                        <div>
                            <div class="about-timeline__year">2022 — Secondary Market</div>
                            <div class="about-timeline__title">Launched peer-to-peer share trading</div>
                            <p class="about-timeline__text">We introduced Dubai's first fractional real estate secondary marketplace, enabling investors to buy and sell shares in any listed property at any time — ending the illiquidity problem of traditional property investment.</p>
                        </div>
                    </li>
                    <li class="about-timeline__item">
                        <div class="about-timeline__dot">5</div>
                        <div>
                            <div class="about-timeline__year">2024 — REIT Products</div>
                            <div class="about-timeline__title">Introduced Income REIT &amp; Growth REIT portfolios</div>
                            <p class="about-timeline__text">We launched two managed portfolio products — our Income REIT (targeting steady 7–9% rental yields) and Growth REIT (targeting capital appreciation across off-plan and high-growth corridors) — giving investors diversified, one-click exposure to the Dubai market.</p>
                        </div>
                    </li>
                    <li class="about-timeline__item">
                        <div class="about-timeline__dot">6</div>
                        <div>
                            <div class="about-timeline__year">Today</div>
                            <div class="about-timeline__title">$366M+ AUM, 933,000+ investors, 40+ properties</div>
                            <p class="about-timeline__text">EmProp Assets is now one of the most trusted names in Dubai fractional real estate, with over $59 million in dividends distributed to investors and a portfolio spanning Downtown Dubai, Palm Jumeirah, DIFC, Dubai Marina, and beyond.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ── LEADERSHIP TEAM ── --}}
<section class="about-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <span class="about-tag">Leadership</span>
                <h2 class="about-h2">Led by Dubai Real Estate & Fintech Experts</h2>
                <p class="about-p" style="margin:0 auto;">Our leadership brings together decades of experience from the UAE real estate sector, global asset management, and financial technology.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="about-team-card">
                    <div class="about-team-card__avatar">KA</div>
                    <div class="about-team-card__name">Khalid Al-Mansoori</div>
                    <div class="about-team-card__role">CEO & Co-Founder</div>
                    <p class="about-team-card__bio">Former Head of Residential Investments at a leading UAE REIT. 18 years in Dubai real estate across development, asset management, and investment structuring.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="about-team-card">
                    <div class="about-team-card__avatar">SA</div>
                    <div class="about-team-card__name">Sara Al-Hashemi</div>
                    <div class="about-team-card__role">CFO & Co-Founder</div>
                    <p class="about-team-card__bio">CFA charterholder with 15 years in structured finance and real estate capital markets across London and Dubai. Previously at HSBC MENA and Emaar Properties.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="about-team-card">
                    <div class="about-team-card__avatar">RV</div>
                    <div class="about-team-card__name">Rajan Verma</div>
                    <div class="about-team-card__role">CTO</div>
                    <p class="about-team-card__bio">10 years building fintech infrastructure across Singapore and Dubai. Architected the core investment and secondary trading platform powering EmProp Assets.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="about-team-card">
                    <div class="about-team-card__avatar">LB</div>
                    <div class="about-team-card__name">Layla Benali</div>
                    <div class="about-team-card__role">Head of Property</div>
                    <p class="about-team-card__bio">RICS-accredited chartered surveyor. Oversees our 40-point property vetting process, manages all Dubai Land Department filings, and leads the asset management function.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── REGULATORY / COMPLIANCE ── --}}
<section class="about-section about-section--dark">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <span style="display:inline-block; background:rgba(37,99,235,.18); color:#93c5fd; font-size:11px; font-weight:800; letter-spacing:2px; text-transform:uppercase; border:1px solid rgba(147,197,253,.25); border-radius:100px; padding:6px 14px; margin-bottom:14px;">Regulation & Compliance</span>
                <h2 class="about-h2 about-h2--white">Built on a Foundation of Trust &amp; Compliance</h2>
                <p class="about-p about-p--white" style="max-width:580px; margin:0 auto;">Every property on our platform is legally structured, independently valued, and registered with the relevant UAE authorities before a single share is offered to investors.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="about-reg-card">
                    <div class="about-reg-card__icon">🏢</div>
                    <div class="about-reg-card__title">DIFC Incorporated</div>
                    <p class="about-reg-card__text">EmProp Assets is incorporated and headquartered in the Dubai International Financial Centre, one of the world's top financial free zones.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="about-reg-card">
                    <div class="about-reg-card__icon">📋</div>
                    <div class="about-reg-card__title">RERA Compliant</div>
                    <p class="about-reg-card__text">All property transactions are structured in full compliance with UAE Real Estate Regulatory Agency (RERA) guidelines and the Dubai Land Department requirements.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="about-reg-card">
                    <div class="about-reg-card__icon">🔐</div>
                    <div class="about-reg-card__title">Title-Deed Backed</div>
                    <p class="about-reg-card__text">Every investment you make is backed by a real title deed registered with the Dubai Land Department. Your ownership is legally verifiable and protected.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="about-reg-card">
                    <div class="about-reg-card__icon">🌐</div>
                    <div class="about-reg-card__title">International Standards</div>
                    <p class="about-reg-card__text">We apply FATF-aligned AML/KYC procedures and comply with international investor protection standards, enabling participation from investors in 60+ countries.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── OFFICE / CONTACT ── --}}
<section class="about-section about-section--gray">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6">
                <span class="about-tag">Our Office</span>
                <h2 class="about-h2">Headquartered in the Heart of Dubai</h2>
                <p class="about-p">Our team operates from Gate Avenue, DIFC — Dubai's premier financial district and the address trusted by the world's leading banks, law firms, and asset managers.</p>
                <div style="background:#fff; border-radius:14px; padding:28px; border:1px solid #e5e7eb; margin-top:28px;">
                    <div style="display:flex; flex-direction:column; gap:16px;">
                        <div style="display:flex; gap:14px; align-items:flex-start;">
                            <span style="font-size:20px; flex-shrink:0;">📍</span>
                            <div>
                                <div style="font-size:14px; font-weight:700; color:#0f172a; margin-bottom:2px;">Registered Address</div>
                                <div style="font-size:14px; color:#666;">Gate Avenue, Level 14, DIFC, Dubai, UAE, P.O. Box 506683</div>
                            </div>
                        </div>
                        <div style="display:flex; gap:14px; align-items:flex-start;">
                            <span style="font-size:20px; flex-shrink:0;">📧</span>
                            <div>
                                <div style="font-size:14px; font-weight:700; color:#0f172a; margin-bottom:2px;">Investor Relations</div>
                                <div style="font-size:14px; color:#666;">invest@empropassets.com</div>
                            </div>
                        </div>
                        <div style="display:flex; gap:14px; align-items:flex-start;">
                            <span style="font-size:20px; flex-shrink:0;">📞</span>
                            <div>
                                <div style="font-size:14px; font-weight:700; color:#0f172a; margin-bottom:2px;">Support Line</div>
                                <div style="font-size:14px; color:#666;">+971 4 123 4567 · Available 7 days a week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="border-radius:16px; overflow:hidden; box-shadow:0 8px 40px rgba(15,23,42,.12); border:1px solid #e5e7eb; background:#e5e7eb; aspect-ratio:4/3; display:flex; align-items:center; justify-content:center;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.5274406985697!2d55.27840931500967!3d25.21156228390238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43576b3b2d9b%3A0x9e3a1e0b5491a4c8!2sDIFC%2C%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sae!4v1680000000000!5m2!1sen!2sae"
                        width="100%" height="100%" style="border:0; display:block; aspect-ratio:4/3;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        title="EmProp Assets Office — DIFC, Dubai">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── FINAL CTA ── --}}
<section class="about-cta">
    <div class="container">
        <h2>Ready to Invest in Dubai Real Estate?</h2>
        <p>Join 933,000+ investors earning monthly rental income from the world's most dynamic property market.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('show.register') }}" class="about-btn about-btn--gold">Create Free Account</a>
            <a href="{{ route('invest.public') }}"  class="about-btn about-btn--outline">Browse Properties</a>
        </div>
    </div>
</section>

@include('home.footer')


