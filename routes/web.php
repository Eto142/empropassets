<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReitController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\InvestmentController;
use App\Http\Controllers\User\InvestmentHistoryController;
use App\Http\Controllers\User\WithdrawalController;
use Illuminate\Support\Facades\Route;







// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/learn', [HomeController::class, 'learn'])->name('learn');
Route::get('/invest-public', [HomeController::class, 'invest'])->name('invest.public');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');

// REIT Routes
Route::get('/reit', [ReitController::class, 'index'])->name('reit.index');
Route::get('/reit/income', [ReitController::class, 'incomeReit'])->name('reit.income');
Route::get('/reit/growth', [ReitController::class, 'growthReit'])->name('reit.growth');
Route::get('/reit/why', [ReitController::class, 'whyReit'])->name('reit.why');





// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('show.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/personal-info', [RegisterController::class, 'personalInfo'])->name('personal.info');
Route::post('/personal-info', [RegisterController::class, 'storePersonalInfo'])->name('personal.info.store');

Route::get('/verify-otp', [RegisterController::class, 'showOtpForm'])->name('verify.otp');
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify.otp.store');




// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


// Logout Route
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');
Route::get('/verify', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/verify', [AuthController::class, 'verifyCode'])->name('verify.code');



Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgot.password.form');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgot.password.submit');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.submit');







Route::middleware(['auth'])->group(function () {
    
Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
Route::get('/portfolio', [DashboardController::class, 'portfolio'])->name('portfolio');


Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.password');

// Show deposit form
Route::get('/deposit', [DepositController::class, 'showForm'])->name('deposit.form');

// Form submission: getDeposit decides next route
Route::post('/deposit/submit', [DepositController::class, 'getDeposit'])->name('deposit.submit');

// Next pages based on payment method
Route::get('/deposit/bank/{amount}', [DepositController::class, 'bank'])->name('deposit.bank');
Route::get('/deposit/crypto/{amount}/{crypto}', [DepositController::class, 'crypto'])->name('deposit.crypto');

/*
|--------------------------------------------
| Deposit Flow Routes
|--------------------------------------------
*/



// Final deposit submission (upload proof & save)
Route::post('/deposit/make', [DepositController::class, 'makeDeposit'])
    ->name('deposit.make');



    Route::get('/invest-index', [InvestmentController::class, 'index'])->name('invest.index'); // User dashboard invest page
    Route::post('/invest', [InvestmentController::class, 'invest'])
    ->name('investments.invest');
     Route::get('/investments/{id}', [InvestmentController::class, 'show'])->name('investments.show');
    Route::post('/properties/{id}/offer', [InvestmentController::class, 'makeOffer'])
    ->name('properties.offer');




    Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawal');
Route::post('/withdrawal', [WithdrawalController::class, 'withdrawalSubmit'])->name('withdrawal.submit');


Route::get('/investment-history', [InvestmentHistoryController::class, 'investmentHistory'])->name('investment.history');


});

