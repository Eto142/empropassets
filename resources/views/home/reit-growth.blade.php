@include('home.header')

<!-- Hero Section -->
<section style="background: #fff; padding: 100px 0; color: #1a1a2e; border-bottom: 1px solid #e0e0e0;">
    <div class="container text-center">
        <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 20px; letter-spacing: -0.5px;">Growth REITs</h1>
        <p style="font-size: 18px; opacity: 0.85; margin-bottom: 40px;">Build long-term wealth through capital appreciation with high-growth real estate investments</p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Browse Growth REITs</a>
            @else
                <a href="{{ route('show.register') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Create Account</a>
            @endif
            <a href="{{ route('reit.index') }}" style="background: transparent; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none; border: 2px solid #e8a87c;">Back to REITs</a>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section style="padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 25px; color: #1a1a2e;">What Are Growth REITs?</h2>
                <p style="font-size: 16px; color: #555; line-height: 1.8; margin-bottom: 20px;">
                    Growth REITs prioritize capital appreciation over immediate dividend income. They invest in properties with strong appreciation potential, emerging markets, and development projects designed to significantly increase in value over time.
                </p>
                <p style="font-size: 16px; color: #555; line-height: 1.8; margin-bottom: 20px;">
                    Rather than distributing all profits as dividends, growth REITs reinvest earnings to acquire new properties, develop new projects, and expand into new markets—creating substantial long-term wealth building opportunities.
                </p>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 12px 0; color: #555; border-bottom: 1px solid #e0e0e0;">
                        <strong>Annual Yield:</strong> 2-4%
                    </li>
                    <li style="padding: 12px 0; color: #555; border-bottom: 1px solid #e0e0e0;">
                        <strong>Capital Appreciation:</strong> 8-15%+ annually
                    </li>
                    <li style="padding: 12px 0; color: #555; border-bottom: 1px solid #e0e0e0;">
                        <strong>Risk Level:</strong> Moderate to High
                    </li>
                    <li style="padding: 12px 0; color: #555;">
                        <strong>Best For:</strong> Growth-focused, long-term investors
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div style="background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); border-radius: 12px; padding: 50px 30px; color: #fff; text-align: center; box-shadow: 0 4px 16px rgba(220, 38, 38, 0.15);">
                    <div style="font-size: 56px; font-weight: 900; margin-bottom: 10px;">12-15%</div>
                    <div style="font-size: 18px; margin-bottom: 30px;">Potential Annual Total Return</div>
                    <div style="background: rgba(255,255,255,0.15); border-radius: 8px; padding: 20px; margin-bottom: 20px;">
                        <p style="margin-bottom: 10px; font-size: 14px;"><strong>10-Year Growth on $10,000</strong></p>
                        <div style="font-size: 32px; font-weight: 900;">$32,000+</div>
                    </div>
                    <div style="background: rgba(255,255,255,0.15); border-radius: 8px; padding: 20px;">
                        <p style="margin-bottom: 10px; font-size: 14px;"><strong>Investment Doubles in</strong></p>
                        <div style="font-size: 32px; font-weight: 900;">5-6 Years</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Investment Strategy Section -->
<section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Growth REIT Investment Strategies</h2>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Development Projects</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Investments in properties under development or redevelopment with significant appreciation potential
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Emerging Markets</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Real estate in high-growth regions expected to experience significant demand and appreciation
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Value-Add Properties</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Undervalued properties improved through renovations and better management for enhanced value
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Market Expansion</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Geographic expansion into new markets with anticipated strong population and economic growth
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Premium Properties</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Premium properties in prime locations with strong long-term appreciation potential
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">Opportunity Zones</h4>
                    <p style="color: #666; line-height: 1.6; font-size: 14px;">
                        Investments in designated opportunity zones with tax incentives and strong growth potential
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section style="padding: 80px 0;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Key Benefits of Growth REITs</h2>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Significant Capital Appreciation</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Growth REITs target annual returns of 8-15%+ through property value appreciation, significantly outpacing inflation and general market returns over the long term.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Wealth Multiplication</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Your investment has the potential to double or triple over 5-10 years, allowing you to build substantial long-term wealth for retirement or future goals.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Reinvested Profits</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Growth REITs reinvest profits to acquire more properties and develop new projects, creating compound growth opportunities that accelerate wealth building.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Portfolio Expansion Potential</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        As growth REITs expand their property portfolios and geographic presence, shareholders benefit from the increased scale and market reach of the organization.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Tax-Deferred Growth</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        When profits are reinvested rather than distributed, you can defer capital gains taxes until you eventually sell your shares, allowing more capital to compound.
                    </p>
                </div>

                <div style="padding: 30px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #dc2626;">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 15px; color: #1a1a2e;">Strategic Positioning</h4>
                    <p style="color: #666; line-height: 1.8; font-size: 14px;">
                        Growth REITs positioned for expansion during economic growth phases can deliver exceptional returns to investors who stay invested for the long term.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comparison: Income vs Growth -->
<section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Growth REIT vs Income REIT Comparison</h2>
        
        <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <thead>
                    <tr style="background: #1a1a2e; color: #fff;">
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Factor</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Growth REITs</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Income REITs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Primary Focus</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">Capital Appreciation</td>
                        <td style="padding: 16px;">Dividend Income</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Annual Yield</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">2-4%</td>
                        <td style="padding: 16px;">4-8%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Total Expected Return</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">12-15%+</td>
                        <td style="padding: 16px;">6-8%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Volatility</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">Higher</td>
                        <td style="padding: 16px;">Lower</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Investment Horizon</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">Long-term (5-10+ years)</td>
                        <td style="padding: 16px;">Medium to Long-term</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 16px; font-weight: 600;">Risk Level</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">Moderate to High</td>
                        <td style="padding: 16px;">Moderate</td>
                    </tr>
                    <tr>
                        <td style="padding: 16px; font-weight: 600;">Best For</td>
                        <td style="padding: 16px; color: #dc2626; font-weight: 600;">Wealth Building</td>
                        <td style="padding: 16px;">Income & Stability</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Performance Scenarios -->
<section style="padding: 80px 0;">
    <div class="container">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 50px; text-align: center; color: #1a1a2e;">Growth REIT Performance Scenarios</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #1a1a2e;">Conservative Growth</h4>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 13px; margin-bottom: 8px;">Initial Investment</p>
                        <div style="font-size: 24px; font-weight: 700;">$10,000</div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 13px; margin-bottom: 8px;">10-Year Return (8%)</p>
                        <div style="font-size: 28px; font-weight: 700; color: #dc2626;">$21,589</div>
                    </div>
                    <div style="background: #f8f9fa; border-radius: 6px; padding: 12px;">
                        <p style="color: #666; font-size: 13px; margin: 0;">Total Gain: <strong>$11,589</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: linear-gradient(135deg, #fff 0%, #fff8f8 100%); border-radius: 8px; padding: 30px; border: 2px solid #dc2626; text-align: center; box-shadow: 0 4px 16px rgba(220, 38, 38, 0.1);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #dc2626;">Moderate Growth</h4>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 13px; margin-bottom: 8px;">Initial Investment</p>
                        <div style="font-size: 24px; font-weight: 700;">$10,000</div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 13px; margin-bottom: 8px;">10-Year Return (12%)</p>
                        <div style="font-size: 28px; font-weight: 700; color: #dc2626;">$31,058</div>
                    </div>
                    <div style="background: #f8f9fa; border-radius: 6px; padding: 12px;">
                        <p style="color: #666; font-size: 13px; margin: 0;">Total Gain: <strong style="color: #dc2626;">$21,058</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: #fff; border-radius: 8px; padding: 30px; border: 1px solid #e0e0e0; text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                    <h4 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #1a1a2e;">Aggressive Growth</h4>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 13px; margin-bottom: 8px;">Initial Investment</p>
                        <div style="font-size: 24px; font-weight: 700;">$10,000</div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 13px; margin-bottom: 8px;">10-Year Return (15%)</p>
                        <div style="font-size: 28px; font-weight: 700; color: #dc2626;">$40,455</div>
                    </div>
                    <div style="background: #f8f9fa; border-radius: 6px; padding: 12px;">
                        <p style="color: #666; font-size: 13px; margin: 0;">Total Gain: <strong>$30,455</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 80px 0; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: #fff;">
    <div class="container text-center">
        <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 20px;">Begin Your Long-Term Wealth Building</h2>
        <p style="font-size: 18px; opacity: 0.85; margin-bottom: 30px;">Invest in growth REITs and watch your wealth multiply over time</p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #fff; color: #dc2626; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Browse Growth REITs</a>
            @else
                <a href="{{ route('show.register') }}" style="background: #fff; color: #dc2626; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Create Account</a>
            @endif
            <a href="{{ route('reit.why') }}" style="background: transparent; color: #fff; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none; border: 2px solid #fff;">Learn Why REITs</a>
        </div>
    </div>
</section>

@include('home.footer')
                <div style="background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e5e7eb;">
                    <div style="font-size: 48px; margin-bottom: 15px;">🔄</div>
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Market Expansion</h4>
                    <p style="color: #666; line-height: 1.6;">
                        Geographic expansion into new markets with anticipated strong population and economic growth
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e5e7eb;">
                    <div style="font-size: 48px; margin-bottom: 15px;">🏢</div>
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Class-A Properties</h4>
                    <p style="color: #666; line-height: 1.6;">
                        Premium properties in prime locations with strong long-term appreciation potential
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e5e7eb;">
                    <div style="font-size: 48px; margin-bottom: 15px;">🚀</div>
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px;">Opportunity Zone</h4>
                    <p style="color: #666; line-height: 1.6;">
                        Investments in designated opportunity zones with tax incentives and growth potential
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section style="padding: 80px 0;">
    <div class="container">
        <h2 class="text-center" style="font-size: 42px; font-weight: 900; margin-bottom: 50px;">Key Benefits of Growth REITs</h2>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div style="padding: 30px; background: #fff3f3; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid #dc2626;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #dc2626;">✓ Significant Capital Appreciation</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Growth REITs target annual returns of 8-15% or more through property value appreciation, significantly outpacing inflation and general market returns over the long term.
                    </p>
                </div>

                <div style="padding: 30px; background: #fff3f3; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid #dc2626;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #dc2626;">✓ Wealth Multiplication</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Your investment has the potential to double or triple over 5-10 years, allowing you to build substantial long-term wealth for retirement or future goals.
                    </p>
                </div>

                <div style="padding: 30px; background: #fff3f3; border-radius: 12px; border-left: 4px solid #dc2626;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #dc2626;">✓ Reinvested Profits</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Growth REITs reinvest profits to acquire more properties and develop new projects, creating compound growth opportunities that accelerate wealth building.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div style="padding: 30px; background: #fff3f3; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid #dc2626;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #dc2626;">✓ Portfolio Expansion Potential</h4>
                    <p style="color: #666; line-height: 1.8;">
                        As growth REITs expand their property portfolios and geographic presence, shareholders benefit from the increased scale and market reach of the organization.
                    </p>
                </div>

                <div style="padding: 30px; background: #fff3f3; border-radius: 12px; margin-bottom: 20px; border-left: 4px solid #dc2626;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #dc2626;">✓ Tax-Deferred Growth</h4>
                    <p style="color: #666; line-height: 1.8;">
                        When profits are reinvested rather than distributed, you can defer capital gains taxes until you eventually sell your shares, allowing more money to remain invested.
                    </p>
                </div>

                <div style="padding: 30px; background: #fff3f3; border-radius: 12px; border-left: 4px solid #dc2626;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 15px; color: #dc2626;">✓ Market Cycle Positioning</h4>
                    <p style="color: #666; line-height: 1.8;">
                        Growth REITs positioned for expansion during economic growth phases can deliver exceptional returns to early investors in the growth cycle.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comparison: Income vs Growth -->
<section style="padding: 80px 0; background: #f9fafb;">
    <div class="container">
        <h2 class="text-center" style="font-size: 42px; font-weight: 900; margin-bottom: 50px;">Growth REIT vs Income REIT Comparison</h2>
        
        <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.05);">
                <thead>
                    <tr style="background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: #fff;">
                        <th style="padding: 20px; text-align: left; font-weight: 700;">Factor</th>
                        <th style="padding: 20px; text-align: left; font-weight: 700;">Growth REITs</th>
                        <th style="padding: 20px; text-align: left; font-weight: 700;">Income REITs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 20px; font-weight: 600;">Primary Focus</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">Capital Appreciation</td>
                        <td style="padding: 20px;">Dividend Income</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 20px; font-weight: 600;">Annual Yield</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">2-4%</td>
                        <td style="padding: 20px;">4-8%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 20px; font-weight: 600;">Expected Annual Return</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">12-15%+</td>
                        <td style="padding: 20px;">6-8%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 20px; font-weight: 600;">Volatility</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">Higher</td>
                        <td style="padding: 20px;">Lower</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 20px; font-weight: 600;">Investment Horizon</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">Long-term (5-10+ years)</td>
                        <td style="padding: 20px;">Medium to Long-term</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 20px; font-weight: 600;">Risk Level</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">Moderate to High</td>
                        <td style="padding: 20px;">Moderate</td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; font-weight: 600;">Best For</td>
                        <td style="padding: 20px; color: #dc2626; font-weight: 600;">Wealth Building, Growth</td>
                        <td style="padding: 20px;">Income, Stability</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Performance Scenarios -->
<section style="padding: 80px 0;">
    <div class="container">
        <h2 class="text-center" style="font-size: 42px; font-weight: 900; margin-bottom: 50px;">Growth REIT Performance Scenarios</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div style="background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e5e7eb; text-align: center;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #dc2626;">Conservative Growth</h4>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">Initial Investment</p>
                        <div style="font-size: 24px; font-weight: 900;">$10,000</div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">10-Year Return (8%)</p>
                        <div style="font-size: 28px; font-weight: 900; color: #dc2626;">$21,589</div>
                    </div>
                    <div style="background: #fff3f3; border-radius: 8px; padding: 15px;">
                        <p style="color: #666; font-size: 14px; margin: 0;">Total Gain: <strong>$11,589</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: linear-gradient(135deg, #fff3f3 0%, #ffe5e5 100%); border-radius: 16px; padding: 30px; border: 2px solid #dc2626; text-align: center; transform: scale(1.05);">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #dc2626;">Moderate Growth</h4>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">Initial Investment</p>
                        <div style="font-size: 24px; font-weight: 900;">$10,000</div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">10-Year Return (12%)</p>
                        <div style="font-size: 28px; font-weight: 900; color: #dc2626;">$31,058</div>
                    </div>
                    <div style="background: #fff; border-radius: 8px; padding: 15px;">
                        <p style="color: #666; font-size: 14px; margin: 0;">Total Gain: <strong style="color: #dc2626;">$21,058</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div style="background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e5e7eb; text-align: center;">
                    <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: #dc2626;">Aggressive Growth</h4>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">Initial Investment</p>
                        <div style="font-size: 24px; font-weight: 900;">$10,000</div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <p style="color: #666; font-size: 14px; margin-bottom: 10px;">10-Year Return (15%)</p>
                        <div style="font-size: 28px; font-weight: 900; color: #dc2626;">$40,455</div>
                    </div>
                    <div style="background: #fff3f3; border-radius: 8px; padding: 15px;">
                        <p style="color: #666; font-size: 14px; margin: 0;">Total Gain: <strong>$30,455</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 80px 0; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: #fff;">
    <div class="container text-center">
        <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 20px;">Begin Your Long-Term Wealth Building Journey</h2>
        <p style="font-size: 18px; opacity: 0.9; margin-bottom: 30px;">Invest in growth REITs and watch your wealth multiply over time</p>
        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #fff; color: #dc2626; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration: none; border: 2px solid #fff;">Browse Growth REITs</a>
            @else
                <a href="{{ route('show.register') }}" style="background: #fff; color: #dc2626; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration: none; border: 2px solid #fff;">Create Free Account</a>
            @endif
            <a href="{{ route('reit.why') }}" style="background: transparent; color: #fff; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration: none; border: 2px solid #fff;">Learn Why REITs</a>
        </div>
    </div>
</section>

@include('home.footer')
