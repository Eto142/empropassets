
    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <h3 class="footer-title">Join Our List</h3>
                    <p class="footer-subtitle">Add your email below to receive updates from EMAAR Properties Assets, including our guides to investing in rental homes, and notifications about new rental properties & markets.</p>
                    <div class="email-form">
                        <input type="email" placeholder="Your Email" class="email-input">
                        <button class="btn-get-started">GET STARTED</button>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-column-title">Invest</h5>
                    <ul class="footer-links">
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">Browse Properties</a></li>
                        <li><a href="#">Offering Circular</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-column-title">Learn</h5>
                    <ul class="footer-links">
                        <li><a href="#">Learning Center</a></li>
                        <li><a href="#">Help & FAQ</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Real Estate Investment Guide</a></li>
                        <li><a href="#">Glossary</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="footer-column-title">Company</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('careers') }}">Careers</a></li>
                        <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="#">Stakeholder Commitments</a></li>
                        <li><a href="#">Affiliate</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 EMAAR Properties Assets. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Footer CTA -->
    <section class="footer-cta">
        <div class="container">
            <a href="{{ route('show.register') }}" class="btn-cta" style="text-decoration: none; display: inline-block;">START INVESTING TODAY</a>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
