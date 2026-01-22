@include('home.header')

<section class="page-hero" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); padding: 100px 0; color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 style="font-size: 56px; font-weight: 900; margin-bottom: 20px;">Start Investing Today</h1>
                <p style="font-size: 20px; opacity: 0.9;">Browse available properties and start building your real estate portfolio with as little as $100.</p>
            </div>
        </div>
    </div>
</section>

<section class="invest-content" style="padding: 80px 0;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center mb-5">
                <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 20px;">How It Works</h2>
                <p style="font-size: 18px; color: #666; max-width: 700px; margin: 0 auto;">Investing in real estate has never been easier. Follow these simple steps to get started.</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-4 mb-4">
                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); border-radius: 50%; margin: 0 auto 25px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 36px; font-weight: 900;">1</div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px;">Create Account</h3>
                    <p style="color: #666; line-height: 1.6;">Sign up in minutes with just your email and basic information. No credit check required to browse.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); border-radius: 50%; margin: 0 auto 25px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 36px; font-weight: 900;">2</div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px;">Browse Properties</h3>
                    <p style="color: #666; line-height: 1.6;">Explore our curated selection of rental properties. Each listing includes detailed financial projections and property information.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div style="text-align: center; padding: 30px;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); border-radius: 50%; margin: 0 auto 25px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 36px; font-weight: 900;">3</div>
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px;">Invest & Earn</h3>
                    <p style="color: #666; line-height: 1.6;">Purchase shares starting at $100. Receive monthly dividends and benefit from property appreciation over time.</p>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <div style="background: #f9fafb; border-radius: 20px; padding: 60px; text-align: center;">
                    <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 20px;">Why Invest with EMAAR Properties Assets?</h2>
                    <div class="row mt-4">
                        <div class="col-lg-4 mb-4">
                            <div style="font-size: 48px; margin-bottom: 15px;">💰</div>
                            <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">Low Minimum Investment</h4>
                            <p style="color: #666;">Start with just $100 per property</p>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div style="font-size: 48px; margin-bottom: 15px;">📊</div>
                            <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">Monthly Dividends</h4>
                            <p style="color: #666;">Receive regular income from rental properties</p>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div style="font-size: 48px; margin-bottom: 15px;">🏠</div>
                            <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">No Management Hassle</h4>
                            <p style="color: #666;">We handle all property management for you</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 30px;">Ready to Get Started?</h2>
                <p style="font-size: 18px; color: #666; margin-bottom: 40px;">Join thousands of investors building their real estate portfolios.</p>
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('show.register') }}" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: #fff; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block;">Create Account</a>
                    <a href="{{ route('login') }}" style="background: #fff; color: #2563eb; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block; border: 2px solid #2563eb;">Log In</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.footer')

