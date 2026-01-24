@include('home.header')

<!-- Hero Section -->
<section style="background: #fff; padding: 120px 0; color: #1a1a2e; border-bottom: 1px solid #e0e0e0;">
    <div class="container text-center">
        <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 20px; letter-spacing: -0.5px;">Income REITs</h1>
        <p style="font-size: 18px; opacity: 0.85; margin-bottom: 40px; line-height: 1.6; max-width: 600px; margin-left: auto; margin-right: auto;">Invest in income-producing properties designed to generate steady, predictable returns. Perfect for income-focused investors seeking consistent cash flow.</p>
        <div style="display:flex; justify-content:center; gap: 16px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration:none;">Browse REITs</a>
            @else
                <a href="{{ route('show.register') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration:none;">Create Account</a>
            @endif
            <a href="{{ route('reit.index') }}" style="background: transparent; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration:none; border: 2px solid #e8a87c;">Back to Overview</a>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section style="padding: 100px 0; background: #fff;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 25px; color: #1a1a2e;">Steady Dividend Income</h2>
                <p style="font-size: 15px; color: #555; line-height: 1.8; margin-bottom: 20px;">
                    Income REITs focus on generating consistent cash flow from rental-producing properties. They invest in apartment complexes, office buildings, retail centers, warehouses, hotels, and healthcare facilities that generate regular income.
                </p>
                <p style="font-size: 15px; color: #555; line-height: 1.8; margin-bottom: 30px;">
                    By law, REITs must distribute at least 90% of taxable income to shareholders, ensuring regular dividend payments that create a steady income stream.
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="padding: 20px; background: #f8f9fa; border-radius: 8px;">
                        <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Average Annual Yield</div>
                        <div style="font-size: 24px; font-weight: 700; color: #e8a87c;">4-8%</div>
                    </div>
                    <div style="padding: 20px; background: #f8f9fa; border-radius: 8px;">
                        <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Distribution Frequency</div>
                        <div style="font-size: 24px; font-weight: 700; color: #e8a87c;">Monthly</div>
                    </div>
                    <div style="padding: 20px; background: #f8f9fa; border-radius: 8px;">
                        <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Risk Level</div>
                        <div style="font-size: 24px; font-weight: 700; color: #e8a87c;">Moderate</div>
                    </div>
                    <div style="padding: 20px; background: #f8f9fa; border-radius: 8px;">
                        <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Investment Horizon</div>
                        <div style="font-size: 24px; font-weight: 700; color: #e8a87c;">3-10 years</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="background: linear-gradient(135deg, #f8f9fa 0%, #f0f0f0 100%); border-radius: 8px; padding: 50px 40px; text-align: center; border: 1px solid #e0e0e0;">
                    <div style="margin-bottom: 30px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">Monthly Income on</p>
                        <div style="font-size: 32px; font-weight: 700; color: #1a1a2e;">$10,000 Investment</div>
                    </div>
                    <div style="background: #fff; border-radius: 6px; padding: 30px; margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 8px;">At 5.6% Yield</p>
                        <div style="font-size: 40px; font-weight: 700; color: #e8a87c;">$47</div>
                        <p style="color: #999; font-size: 13px; margin-top: 8px;">Monthly dividend</p>
                    </div>
                    <div style="background: #fff; border-radius: 6px; padding: 30px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 8px;">Annual Income</p>
                        <div style="font-size: 40px; font-weight: 700; color: #e8a87c;">$560</div>
                        <p style="color: #999; font-size: 13px; margin-top: 8px;">Yearly dividend</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property Types Section -->
<section style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 70px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">Property Types</h2>
            <p style="font-size: 16px; color: #666; opacity: 0.9;">Diversified across multiple real estate sectors</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 35px; border: 1px solid #e0e0e0;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Residential Apartments</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px; font-size: 14px;">Multi-family residential buildings generating consistent rental income.</p>
                    <div style="font-size: 13px; color: #e8a87c; font-weight: 600;">Avg. Yield: 4-6%</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 35px; border: 1px solid #e0e0e0;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Retail Centers</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px; font-size: 14px;">Shopping centers with established tenants and long-term leases.</p>
                    <div style="font-size: 13px; color: #e8a87c; font-weight: 600;">Avg. Yield: 5-7%</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 35px; border: 1px solid #e0e0e0;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Office Buildings</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px; font-size: 14px;">Class A office spaces leased to corporate tenants.</p>
                    <div style="font-size: 13px; color: #e8a87c; font-weight: 600;">Avg. Yield: 4-5%</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 35px; border: 1px solid #e0e0e0;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Industrial/Warehouses</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px; font-size: 14px;">Logistics facilities leased to distribution companies.</p>
                    <div style="font-size: 13px; color: #e8a87c; font-weight: 600;">Avg. Yield: 5-8%</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 35px; border: 1px solid #e0e0e0;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Hospitality</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px; font-size: 14px;">Hotels generating daily room rental and ancillary revenue.</p>
                    <div style="font-size: 13px; color: #e8a87c; font-weight: 600;">Avg. Yield: 5-9%</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 35px; border: 1px solid #e0e0e0;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Healthcare Properties</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px; font-size: 14px;">Medical facilities and senior living with stable tenants.</p>
                    <div style="font-size: 13px; color: #e8a87c; font-weight: 600;">Avg. Yield: 5-7%</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Advantages Section -->
<section style="padding: 100px 0; background: #fff;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 70px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">Why Choose Income REITs</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Predictable Cash Flow</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Income REITs are designed to provide regular dividend payments. Most distribute monthly or quarterly, allowing you to plan confidently.</p>
                </div>

                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Lower Volatility</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">These REITs tend to be more stable with less price fluctuation, making them ideal for risk-averse investors.</p>
                </div>

                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">No Maintenance Burden</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Professional property managers handle all operations while you collect dividends.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Portfolio Diversification</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Add real estate exposure across multiple properties and sectors with minimal capital.</p>
                </div>

                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Tax Advantages</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">REIT dividends may qualify for preferential tax treatment. Consult a tax professional for your situation.</p>
                </div>

                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Inflation Protection</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Real estate values and rents typically increase with inflation over time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Performance Table -->
<section style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 70px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">Income REIT Performance</h2>
            <p style="font-size: 16px; color: #666;">Based on historical average data</p>
        </div>
        
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div style="background: #fff; border-radius: 8px; padding: 40px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <div style="font-size: 42px; font-weight: 700; color: #e8a87c; margin-bottom: 12px;">5.6%</div>
                    <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 8px; color: #1a1a2e;">Average Annual Yield</h4>
                    <p style="color: #666; margin: 0; font-size: 14px;">Historical average dividend yield</p>
                </div>
            </div>

            <div class="col-md-6">
                <div style="background: #fff; border-radius: 8px; padding: 40px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <div style="font-size: 42px; font-weight: 700; color: #e8a87c; margin-bottom: 12px;">2-3%</div>
                    <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 8px; color: #1a1a2e;">Annual Appreciation</h4>
                    <p style="color: #666; margin: 0; font-size: 14px;">Capital appreciation from property value growth</p>
                </div>
            </div>
        </div>

        <div style="background: #fff; border-radius: 8px; padding: 40px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
            <h4 style="font-size: 18px; font-weight: 700; margin-bottom: 25px; color: #1a1a2e;">Sample Diversified Portfolio</h4>
            <div class="table-responsive">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #e8a87c;">
                            <th style="padding: 15px; text-align: left; font-weight: 700; color: #1a1a2e; font-size: 14px;">Property Type</th>
                            <th style="padding: 15px; text-align: left; font-weight: 700; color: #1a1a2e; font-size: 14px;">Portfolio %</th>
                            <th style="padding: 15px; text-align: left; font-weight: 700; color: #1a1a2e; font-size: 14px;">Yield</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid #e0e0e0;">
                            <td style="padding: 15px; color: #555; font-size: 14px;">Apartment Complexes</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">40%</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">5.5%</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e0e0e0; background: #f8f9fa;">
                            <td style="padding: 15px; color: #555; font-size: 14px;">Retail Centers</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">25%</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">6.2%</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e0e0e0;">
                            <td style="padding: 15px; color: #555; font-size: 14px;">Office Buildings</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">20%</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">4.8%</td>
                        </tr>
                        <tr style="background: #f8f9fa;">
                            <td style="padding: 15px; color: #555; font-size: 14px;">Warehouses</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">15%</td>
                            <td style="padding: 15px; color: #555; font-size: 14px;">6.5%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('home.footer')
