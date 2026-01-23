<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMAAR Properties Assets - Real Estate Investment Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
   <link href="{{ asset('assets/styles.css') }}" rel="stylesheet">
    <style>
        /* Preloader styles */
        #preloader{
            position:fixed;
            inset:0;
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(180deg,#ffffff 0%, #f7fbff 100%);
            z-index:99999;
            transition:opacity .45s ease, visibility .45s ease;
        }
        #preloader.hide{opacity:0; visibility:hidden; pointer-events:none}
        .preloader-card{
            text-align:center;
            max-width:320px;
            padding:22px 26px;
            border-radius:12px;
            box-shadow:0 10px 30px rgba(16,24,40,0.08);
            background:linear-gradient(180deg, rgba(255,255,255,0.9), rgba(250,252,255,0.9));
        }
        .preloader-illustration{width:78px;height:78px;margin:0 auto 12px;display:block}
        .preloader-title{font-weight:700;margin-bottom:6px;font-size:16px;color:#0f172a}
        .preloader-sub{font-size:13px;color:#475569;margin-bottom:8px}
        .roof-anim{transform-origin:50% 60%;animation:roof 1s ease-in-out infinite}
        @keyframes roof{0%{transform:translateY(0)}50%{transform:translateY(-6px)}100%{transform:translateY(0)}}
        .preloader-dot{width:8px;height:8px;background:#2563eb;border-radius:50%;display:inline-block;margin:0 4px;animation:dot 1s infinite}
        .preloader-dot:nth-child(2){animation-delay:.15s}
        .preloader-dot:nth-child(3){animation-delay:.3s}
        @keyframes dot{0%{opacity:.2;transform:translateY(0)}50%{opacity:1;transform:translateY(-6px)}100%{opacity:.2;transform:translateY(0)}}
        @media (max-width:576px){.preloader-card{max-width:260px;padding:18px}}
    </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader" role="status" aria-label="Loading">
        <div class="preloader-card">
            <!-- simple house SVG with animated roof -->
            <svg class="preloader-illustration" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path class="roof-anim" d="M4 28 L32 6 L60 28 Z" fill="#2563eb" stroke="#1d4ed8" stroke-width="1"/>
                <rect x="10" y="30" width="44" height="22" rx="3" fill="#e6f3ff" stroke="#cfe8ff"/>
                <rect x="28" y="38" width="8" height="12" rx="1" fill="#0f172a"/>
                <rect x="16" y="36" width="6" height="6" rx="1" fill="#eaf6ff"/>
                <rect x="42" y="36" width="6" height="6" rx="1" fill="#eaf6ff"/>
            </svg>
            <div class="preloader-title">Emaar Properties Assets</div>
            <div class="preloader-sub">Loading properties and market data</div>
            <div style="margin-top:10px">
                <span class="preloader-dot"></span>
                <span class="preloader-dot"></span>
                <span class="preloader-dot"></span>
            </div>
        </div>
    </div>
    <script>
        // Hide preloader once the page fully loads
        window.addEventListener('load', function(){
            var p = document.getElementById('preloader');
            if(!p) return;
            p.classList.add('hide');
            setTimeout(function(){ if(p && p.parentNode) p.parentNode.removeChild(p); }, 600);
        });
    </script>
    <!-- Header Banner -->
    {{-- <div class="header-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-1 text-center">
                    <div style="width: 32px; height: 32px; background-color: #666; border-radius: 50%; margin: 0 auto;"></div>
                </div>
                <div class="col-md-10">
                    <span>EMAAR Properties Assets has secured $27 million in new funding! <a href="#">Read how this milestone will continue to help us build the future</a> 🚀</span>
                </div>
                <div class="col-md-1 text-end">
                    <button style="background: none; border: none; color: #fff; cursor: pointer; font-size: 20px;">✕</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}"><img src ="{{ asset('images/logo.png') }}" width="170px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('invest.public') }}">INVEST</a>
                    <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
                    <a class="nav-link" href="{{ route('learn') }}">LEARN</a>
                    <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
                    <a class="btn-signup" href="{{ route('show.register') }}">REGISTER</a>
                </div>
            </div>
        </div>
    </nav>