<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;





// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/learn', [HomeController::class, 'learn'])->name('learn');
Route::get('/invest-public', [HomeController::class, 'invest'])->name('invest.public');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');





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
Route::get('/invest', [DashboardController::class, 'invest'])->name('invest'); // User dashboard invest page
Route::get('/portfolio', [DashboardController::class, 'portfolio'])->name('portfolio');
Route::get('/deposit', [DashboardController::class, 'deposit'])->name('deposit');
Route::post('/deposit', [DashboardController::class, 'depositSubmit'])->name('deposit.submit');
Route::get('/withdrawal', [DashboardController::class, 'withdrawal'])->name('withdrawal');
Route::post('/withdrawal', [DashboardController::class, 'withdrawalSubmit'])->name('withdrawal.submit');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/password', [DashboardController::class, 'updatePassword'])->name('profile.password');
Route::get('/investment-history', [DashboardController::class, 'investmentHistory'])->name('investment.history');

// Route::get('/payment-history', [DashboardController::class, 'PaymentHistory'])->name('payment.history');
// Route::get('/gas-billing', [DashboardController::class, 'gasBilling'])->name('gas-billing');
});

