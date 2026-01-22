<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMAAR Properties Assets - Real Estate Investment Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
   <link href="{{ asset('assets/styles.css') }}" rel="stylesheet">
</head>
<body>
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