@include('home.header')

<!-- Hero Section -->
<section style="background: #fff; padding: 120px 0; color: #1a1a2e; border-bottom: 1px solid #e0e0e0;">
    <div class="container text-center">
        <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 20px; letter-spacing: -0.5px;">Real Estate Investment Trusts</h1>
        <p style="font-size: 18px; opacity: 0.85; margin-bottom: 40px; line-height: 1.6; max-width: 600px; margin-left: auto; margin-right: auto;">Diversify your investment portfolio with professionally managed real estate assets. Build wealth through income-generating properties and capital appreciation.</p>
        <div style="display:flex; justify-content:center; gap: 16px; flex-wrap: wrap;">
            <a href="{{ route('reit.income') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration:none; border:none; font-size: 15px;">Explore Income REITs</a>
            <a href="{{ route('reit.growth') }}" style="background: transparent; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration:none; border: 2px solid #e8a87c; font-size: 15px;">Explore Growth REITs</a>
        </div>
    </div>
</section>

<!-- REIT Types Section -->
<section style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 70px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">Two Investment Approaches</h2>
            <p style="font-size: 16px; color: #666; opacity: 0.9;">Choose between steady income or long-term growth</p>
        </div>
        
        <div class="row g-4">
            <!-- Income REITs Card -->
            <div class="col-lg-6">
                <div style="background: #fff; border-radius: 8px; padding: 50px 40px; border: 1px solid #e0e0e0; transition: all 0.3s ease; box-shadow: 0 2px 12px rgba(0,0,0,0.06);" 
                     onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'; this.style.transform='translateY(-3px)'" 
                     onmouseout="this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'; this.style.transform='translateY(0)'">
                    <div style="font-size: 32px; margin-bottom: 20px; width: 50px; height: 50px; background: #e8f3f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">💵</div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Income REITs</h3>
                    <p style="color: #666; line-height: 1.8; margin-bottom: 25px; font-size: 14px;">
                        Generate steady, predictable income through rental properties and property appreciation. Ideal for investors seeking consistent cash flow.
                    </p>
                    <div style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #e0e0e0;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: #666; font-size: 14px;">Average Yield</span>
                            <span style="color: #1a1a2e; font-weight: 700;">4-8% annually</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: #666; font-size: 14px;">Distribution</span>
                            <span style="color: #1a1a2e; font-weight: 700;">Monthly/Quarterly</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #666; font-size: 14px;">Risk Level</span>
                            <span style="color: #1a1a2e; font-weight: 700;">Moderate</span>
                        </div>
                    </div>
                    <a href="{{ route('reit.income') }}" style="color: #e8a87c; text-decoration: none; font-weight: 600; font-size: 14px;">Learn More →</a>
                </div>
            </div>

            <!-- Growth REITs Card -->
            <div class="col-lg-6">
                <div style="background: #fff; border-radius: 8px; padding: 50px 40px; border: 1px solid #e0e0e0; transition: all 0.3s ease; box-shadow: 0 2px 12px rgba(0,0,0,0.06);" 
                     onmouseover="this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'; this.style.transform='translateY(-3px)'" 
                     onmouseout="this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'; this.style.transform='translateY(0)'">
                    <div style="font-size: 32px; margin-bottom: 20px; width: 50px; height: 50px; background: #f0e8f3; border-radius: 8px; display: flex; align-items: center; justify-content: center;">📈</div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Growth REITs</h3>
                    <p style="color: #666; line-height: 1.8; margin-bottom: 25px; font-size: 14px;">
                        Maximize capital appreciation through development projects and emerging markets. Perfect for long-term wealth building.
                    </p>
                    <div style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #e0e0e0;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: #666; font-size: 14px;">Expected Return</span>
                            <span style="color: #1a1a2e; font-weight: 700;">12-15%+ annually</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span style="color: #666; font-size: 14px;">Investment Horizon</span>
                            <span style="color: #1a1a2e; font-weight: 700;">5-10+ years</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="color: #666; font-size: 14px;">Risk Level</span>
                            <span style="color: #1a1a2e; font-weight: 700;">Moderate-High</span>
                        </div>
                    </div>
                    <a href="{{ route('reit.growth') }}" style="color: #e8a87c; text-decoration: none; font-weight: 600; font-size: 14px;">Learn More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section style="padding: 100px 0; background: #fff;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 70px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">Why Real Estate Investors Choose REITs</h2>
            <p style="font-size: 16px; color: #666; opacity: 0.9;">Professional management, diversification, and consistent returns</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Professional Management</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Expert teams handle all operations, tenant management, and property maintenance.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Portfolio Diversification</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Own multiple properties across sectors and geographies with minimal capital.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Lower Entry Costs</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Start investing with just $100. No down payments or mortgage approvals needed.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">High Liquidity</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Buy and sell within days, unlike physical property which takes months.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Consistent Income</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Mandatory 90% distribution of taxable income ensures regular dividends.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div style="padding: 35px; background: #f8f9fa; border-radius: 8px; border-left: 3px solid #e8a87c;">
                    <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 12px; color: #1a1a2e;">Inflation Protection</h4>
                    <p style="color: #666; line-height: 1.6; margin: 0; font-size: 14px;">Real estate values and rents rise with inflation over time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comparison Section -->
<section style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 70px;">
            <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px; color: #1a1a2e;">REITs vs Direct Property Ownership</h2>
        </div>
        
        <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
                <thead>
                    <tr style="background: #1a1a2e; color: #fff;">
                        <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 14px;">Factor</th>
                        <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 14px;">REITs</th>
                        <th style="padding: 20px; text-align: left; font-weight: 600; font-size: 14px;">Direct Property</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 18px 20px; font-weight: 600; color: #1a1a2e; font-size: 14px;">Initial Investment</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">$100 - $1,000</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">$50,000 - $500,000+</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0; background: #f8f9fa;">
                        <td style="padding: 18px 20px; font-weight: 600; color: #1a1a2e; font-size: 14px;">Management</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Professional team</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Self-managed or hired</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 18px 20px; font-weight: 600; color: #1a1a2e; font-size: 14px;">Time Commitment</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Minimal</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Significant</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0; background: #f8f9fa;">
                        <td style="padding: 18px 20px; font-weight: 600; color: #1a1a2e; font-size: 14px;">Liquidity</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Days</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Months</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e0e0e0;">
                        <td style="padding: 18px 20px; font-weight: 600; color: #1a1a2e; font-size: 14px;">Diversification</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Easy</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Limited</td>
                    </tr>
                    <tr style="background: #f8f9fa;">
                        <td style="padding: 18px 20px; font-weight: 600; color: #1a1a2e; font-size: 14px;">Maintenance Burden</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">None</td>
                        <td style="padding: 18px 20px; color: #666; font-size: 14px;">Owner responsible</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section style="padding: 100px 0; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: #fff;">
    <div class="container text-center">
        <h2 style="font-size: 36px; font-weight: 700; margin-bottom: 15px;">Start Your Real Estate Investment Journey</h2>
        <p style="font-size: 16px; opacity: 0.85; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">Choose from income-generating properties or growth-oriented investments</p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            @if(auth()->check())
                <a href="{{ route('invest') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Start Investing</a>
            @else
                <a href="{{ route('show.register') }}" style="background: #e8a87c; color: #1a1a2e; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none;">Create Free Account</a>
                <a href="{{ route('reit.why') }}" style="background: transparent; color: #fff; padding: 14px 36px; border-radius: 6px; font-weight: 600; text-decoration: none; border: 2px solid #e8a87c;">Learn More</a>
            @endif
        </div>
    </div>
</section>

@include('home.footer')
