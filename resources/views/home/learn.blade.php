@include('home.header')

<section class="page-hero" style="background: linear-gradient(135deg, #059669 0%, #10b981 100%); padding: 100px 0; color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 style="font-size: 56px; font-weight: 900; margin-bottom: 20px;">Learn About Real Estate Investing</h1>
                <p style="font-size: 20px; opacity: 0.9;">Everything you need to know to start building your real estate portfolio.</p>
            </div>
        </div>
    </div>
</section>

<section class="learn-content" style="padding: 80px 0;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 30px; height: 100%; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
                            <div style="font-size: 48px; margin-bottom: 20px;">📚</div>
                            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px;">Getting Started</h3>
                            <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Learn the basics of real estate investing and how to get started with EMAAR Properties Assets.</p>
                            <a href="#" style="color: #2563eb; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 30px; height: 100%; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
                            <div style="font-size: 48px; margin-bottom: 20px;">💰</div>
                            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px;">Understanding Returns</h3>
                            <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Discover how dividends, appreciation, and rental income contribute to your investment returns.</p>
                            <a href="#" style="color: #2563eb; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div style="background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 30px; height: 100%; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'" onmouseout="this.style.transform=''; this.style.boxShadow=''">
                            <div style="font-size: 48px; margin-bottom: 20px;">🏠</div>
                            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px;">Property Selection</h3>
                            <p style="color: #666; line-height: 1.6; margin-bottom: 20px;">Learn how we select properties and what factors contribute to successful investments.</p>
                            <a href="#" style="color: #2563eb; font-weight: 600; text-decoration: none;">Read More →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 40px; text-align: center;">Frequently Asked Questions</h2>
                <div class="accordion" id="learnAccordion">
                    <div class="accordion-item" style="border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="font-size: 18px; font-weight: 600; padding: 20px;">
                                How does real estate investing work on EMAAR Properties Assets?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#learnAccordion">
                            <div class="accordion-body" style="padding: 20px; color: #666; line-height: 1.8;">
                                EMAAR Properties Assets allows you to invest in rental properties by purchasing shares. Each property is divided into shares, and you can buy as few as one share (starting at $100). You'll receive monthly dividends from rental income and benefit from property appreciation when the property is sold.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="font-size: 18px; font-weight: 600; padding: 20px;">
                                What are the risks involved?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#learnAccordion">
                            <div class="accordion-body" style="padding: 20px; color: #666; line-height: 1.8;">
                                Like any investment, real estate carries risks. Property values can fluctuate, rental income may vary, and there's no guarantee of returns. However, we carefully select properties in strong markets and provide detailed information to help you make informed decisions.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="font-size: 18px; font-weight: 600; padding: 20px;">
                                How do I receive dividends?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#learnAccordion">
                            <div class="accordion-body" style="padding: 20px; color: #666; line-height: 1.8;">
                                Dividends are typically distributed monthly based on rental income after expenses. Funds are deposited directly into your EMAAR Properties Assets account, and you can choose to reinvest or withdraw them.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" style="font-size: 18px; font-weight: 600; padding: 20px;">
                                Can I sell my shares?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#learnAccordion">
                            <div class="accordion-body" style="padding: 20px; color: #666; line-height: 1.8;">
                                Yes! You can sell your shares on our secondary market at any time, or hold them until the property is sold by our team. The secondary market allows you to trade shares with other investors.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 15px;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" style="font-size: 18px; font-weight: 600; padding: 20px;">
                                What fees are involved?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#learnAccordion">
                            <div class="accordion-body" style="padding: 20px; color: #666; line-height: 1.8;">
                                We charge a small management fee that covers property management, maintenance, and platform operations. This fee is deducted from rental income before dividends are distributed. All fees are clearly disclosed before you invest.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="background: linear-gradient(135deg, #1E40AF 0%, #2563eb 100%); border-radius: 20px; padding: 60px; color: #fff;">
            <div class="col-lg-8 mx-auto text-center">
                <h2 style="font-size: 42px; font-weight: 900; margin-bottom: 20px;">Ready to Start Learning?</h2>
                <p style="font-size: 18px; opacity: 0.9; margin-bottom: 30px;">Join thousands of investors building their real estate knowledge and portfolios.</p>
                <a href="{{ route('show.register') }}" style="background: #fff; color: #2563eb; padding: 15px 40px; border-radius: 8px; font-weight: 700; text-decoration: none; display: inline-block;">Get Started Today</a>
            </div>
        </div>
    </div>
</section>

@include('home.footer')

