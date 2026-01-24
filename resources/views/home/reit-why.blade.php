@include('home.header')

<!-- Hero Section -->
<section style="background: #fff; padding: 100px 0; color: #1a1a2e; border-bottom: 1px solid #e0e0e0;">
    <div class="container text-center">
        <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 20px; letter-spacing: -0.5px;">Why Invest in REITs?</h1>
        <p style="font-size: 18px; opacity: 0.85; margin-bottom: 40px;">Discover why REITs are one of the smartest ways to build real estate wealth</p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            <a href="{{ route('reit.index') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Explore REITs</a>
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: transparent; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none; border: 2px solid #e8a87c;">Get Started Investing</a>
            @else
                <a href="{{ route('show.register') }}" style="background: transparent; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none; border: 2px solid #e8a87c;">Create Account</a>
            @endif
        </div>
    </div>
</section>

<!-- Main Benefits Section -->
<section style="padding: 80px 0;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Why Invest in REITs?</h2>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Low Entry Barrier</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Start investing in real estate with as little as $100. Unlike direct property ownership requiring large down payments and mortgage approval, REITs democratize real estate investing and make it accessible to everyone.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Professional Management</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Benefit from expert management teams without the headaches of property management. REIT professionals handle property selection, tenant management, maintenance, and operations.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Instant Diversification</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Own pieces of multiple properties across different sectors and geographic regions. Diversification reduces your risk compared to owning a single property.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Consistent Income</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        REITs must distribute at least 90% of taxable income to shareholders, creating regular, predictable dividend payments for steady passive income.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">High Liquidity</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Sell your REIT investments within days during trading hours. Unlike physical properties that take months to sell, REITs offer flexibility and access to your capital when needed.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Strong Historical Returns</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        REITs have historically delivered competitive long-term returns, typically outpacing inflation and providing both income and capital appreciation over time.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Tangible Asset Backing</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Your investments are backed by actual physical properties - buildings, land, and infrastructure with real intrinsic value. This provides security and stability.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Inflation Protection</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Real estate values and rents increase with inflation over time. REITs provide a hedge against inflation's erosive effects on your purchasing power.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comparison Section -->
<section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">REITs vs Other Investments</h2>
        
        <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <thead>
                    <tr style="background: #1a1a2e; color: #fff;">
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Criteria</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600; color: #e8a87c;">REITs</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Direct Property</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Stocks</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Bonds</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Minimum Investment</td>
                        <td style="padding: 16px; color: #e8a87c; font-weight: 600;">$100-$1,000</td>
                        <td style="padding: 16px;">$50,000+</td>
                        <td style="padding: 16px;">$100+</td>
                        <td style="padding: 16px;">$1,000+</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Annual Income</td>
                        <td style="padding: 16px; color: #e8a87c; font-weight: 600;">4-8%</td>
                        <td style="padding: 16px;">3-6%</td>
                        <td style="padding: 16px;">0-2%</td>
                        <td style="padding: 16px;">3-5%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Management Effort</td>
                        <td style="padding: 16px; color: #e8a87c; font-weight: 600;">None</td>
                        <td style="padding: 16px;">Significant</td>
                        <td style="padding: 16px;">Minimal</td>
                        <td style="padding: 16px;">Minimal</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Liquidity</td>
                        <td style="padding: 16px; color: #e8a87c; font-weight: 600;">High</td>
                        <td style="padding: 16px;">Very Low</td>
                        <td style="padding: 16px;">Very High</td>
                        <td style="padding: 16px;">High</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Long-term Returns</td>
                        <td style="padding: 16px; color: #e8a87c; font-weight: 600;">6-10%</td>
                        <td style="padding: 16px;">6-12%</td>
                        <td style="padding: 16px;">8-12%</td>
                        <td style="padding: 16px;">3-5%</td>
                    </tr>
                    <tr>
                        <td style="padding: 16px; font-weight: 600;">Risk Level</td>
                        <td style="padding: 16px; color: #e8a87c; font-weight: 600;">Moderate</td>
                        <td style="padding: 16px;">Lower</td>
                        <td style="padding: 16px;">Higher</td>
                        <td style="padding: 16px;">Lower</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Who Should Invest Section -->
<section style="padding: 80px 0;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Who Should Invest in REITs?</h2>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Retirees</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Generate steady passive income without managing rental properties or working full-time.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Young Professionals</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Build wealth with minimal time commitment while focusing on your career development.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Portfolio Diversifiers</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Add real estate exposure for better diversification and reduced overall risk.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">First-Time Investors</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Gain real estate exposure without needing significant capital or real estate expertise.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Income Seekers</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Generate consistent monthly or quarterly income to supplement other earnings.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Long-term Builders</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Leverage compound growth to build substantial wealth over 10-30 years.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Frequently Asked Questions</h2>
        
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: #fff; border-radius: 8px; padding: 25px; margin-bottom: 20px; border-left: 3px solid #e8a87c; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <h4 style="font-size: 17px; font-weight: 600; margin-bottom: 10px; color: #1a1a2e;">Are REITs safe investments?</h4>
                <p style="color: #666; margin: 0; line-height: 1.6; font-size: 14px;">
                    REITs are generally considered safe as they're backed by tangible real estate assets and regulated by the SEC. Like any investment, they carry some risk, but diversification reduces volatility significantly.
                </p>
            </div>

            <div style="background: #fff; border-radius: 8px; padding: 25px; margin-bottom: 20px; border-left: 3px solid #e8a87c; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <h4 style="font-size: 17px; font-weight: 600; margin-bottom: 10px; color: #1a1a2e;">How often do REITs pay dividends?</h4>
                <p style="color: #666; margin: 0; line-height: 1.6; font-size: 14px;">
                    Most REITs distribute dividends monthly, quarterly, or annually. Income-focused REITs typically pay monthly or quarterly. Check specific REIT distribution schedules before investing.
                </p>
            </div>

            <div style="background: #fff; border-radius: 8px; padding: 25px; margin-bottom: 20px; border-left: 3px solid #e8a87c; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <h4 style="font-size: 17px; font-weight: 600; margin-bottom: 10px; color: #1a1a2e;">Can I lose money with REITs?</h4>
                <p style="color: #666; margin: 0; line-height: 1.6; font-size: 14px;">
                    Yes, REIT values fluctuate like any investment. However, underlying real estate assets typically appreciate over time. Diversification and long-term horizons help mitigate risks significantly.
                </p>
            </div>

            <div style="background: #fff; border-radius: 8px; padding: 25px; margin-bottom: 20px; border-left: 3px solid #e8a87c; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <h4 style="font-size: 17px; font-weight: 600; margin-bottom: 10px; color: #1a1a2e;">What's the minimum investment to start?</h4>
                <p style="color: #666; margin: 0; line-height: 1.6; font-size: 14px;">
                    On our platform, you can start with as little as $100. This low entry barrier makes real estate investing accessible to virtually everyone, regardless of capital available.
                </p>
            </div>

            <div style="background: #fff; border-radius: 8px; padding: 25px; border-left: 3px solid #e8a87c; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <h4 style="font-size: 17px; font-weight: 600; margin-bottom: 10px; color: #1a1a2e;">How are REIT dividends taxed?</h4>
                <p style="color: #666; margin: 0; line-height: 1.6; font-size: 14px;">
                    REIT dividends are typically taxed as ordinary income. However, they may qualify for preferential tax treatment in certain situations. Consult a tax professional about your specific circumstances.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section style="padding: 80px 0; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: #fff;">
    <div class="container text-center">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 20px;">Ready to Start Your REIT Investment Journey?</h2>
        <p style="font-size: 18px; opacity: 0.85; margin-bottom: 30px;">Join thousands of investors building wealth through real estate investment</p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Start Investing</a>
            @else
                <a href="{{ route('show.register') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Create Account</a>
            @endif
            <a href="{{ route('reit.index') }}" style="background: transparent; color: #fff; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none; border: 2px solid #e8a87c;">Explore REITs</a>
        </div>
    </div>
</section>

@include('home.footer')
