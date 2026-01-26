<!-- Navigation -->
<div class="dashboard-nav">
    <div class="nav-brand">
        <div class="logo-section">
             <a class="navbar-brand" href="{{ route('home') }}"><img src ="{{ asset('images/logo.png') }}" width="170px"></a>
        </div>
    </div>
    <div class="nav-links">
        <a href="{{ route('invest.index') }}" class="{{ request()->routeIs('invest.index') ? 'active' : '' }}">INVEST</a>
        <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">PORTFOLIO</a>
        <a href="{{ route('deposit.form') }}" class="{{ request()->routeIs('deposit.form') ? 'active' : '' }}">DEPOSIT</a>
        <a href="{{ route('withdrawal') }}" class="{{ request()->routeIs('withdrawal') ? 'active' : '' }}">WITHDRAWAL</a>
        <a href="{{ route('investment.history') }}" class="{{ request()->routeIs('investment.history') ? 'active' : '' }}">HISTORY</a>
    </div>
    <div class="nav-right">
        <div class="user-menu" onclick="toggleUserDropdown()">
            <span>{{ strtoupper(auth()->user()->name ?? 'USER') }}</span>
            <span>▼</span>
        </div>
        <div class="user-dropdown" id="userDropdown">
            <a href="{{ route('profile') }}">Profile</a>
            <a href="{{ route('portfolio') }}">Dashboard</a>
            <form method="POST" action="{{ route('user.logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background: none; border: none; width: 100%; text-align: left; padding: 10px 15px; cursor: pointer; color: #333; font-size: 14px;">Logout</button>
            </form>
        </div>
        <div class="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <div class="nav-brand">
           <div class="logo-section">
             <a class="navbar-brand" href="{{ route('homepage') }}"><img src ="{{ asset('images/logo.png') }}" width="170px"></a>
        </div>
        </div>
        <button onclick="toggleMobileMenu()" style="background: none; border: none; font-size: 24px; cursor: pointer; padding: 5px; -webkit-tap-highlight-color: transparent;" aria-label="Close menu">×</button>
    </div>
    <div class="mobile-menu-links">
        <a href="{{ route('invest.index') }}" class="{{ request()->routeIs('invest.index') ? 'active' : '' }}">INVEST</a>
        <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">PORTFOLIO</a>
        <a href="{{ route('deposit.form') }}" class="{{ request()->routeIs('deposit.form') ? 'active' : '' }}">DEPOSIT</a>
        <a href="{{ route('withdrawal') }}" class="{{ request()->routeIs('withdrawal') ? 'active' : '' }}">WITHDRAWAL</a>
        <a href="{{ route('investment.history') }}" class="{{ request()->routeIs('investment.history') ? 'active' : '' }}">HISTORY</a>
        <a href="{{ route('profile') }}">PROFILE</a>
        <form method="POST" action="{{ route('user.logout') }}" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="background: none; border: none; width: 100%; text-align: left; padding: 10px 0; cursor: pointer; color: #333; font-size: 18px; font-weight: 600; text-transform: uppercase; border-top: 1px solid #f0f0f0; margin-top: 10px; padding-top: 20px;">LOGOUT</button>
        </form>
    </div>
</div>

