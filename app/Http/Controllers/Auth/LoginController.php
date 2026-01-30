<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
         if (Auth::check()) {
        return redirect()->route('home'); // already logged in
    }

        return view('auth.login');
    }

    // Handle login
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->route('home');
    //     }

    //     return back()->withErrors([
    //         'email' => 'Invalid email or password.',
    //     ])->withInput();
    // }



    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Check account approval status
        if ($user->account_status === 'pending') {
            Auth::logout();
            return view('auth.pending-approval', ['user' => $user]);
        }

        if ($user->account_status === 'rejected') {
            Auth::logout();
            return view('auth.account-rejected', [
                'reason' => $user->rejection_reason ?? 'Your account registration did not meet our requirements.'
            ]);
        }

        // Check if registration is incomplete
        if (!$user->email_verified_at) {

            // Store partial registration in session
            session(['register_data' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'dob' => $user->dob,
                'country' => $user->country,
                'otp' => $user->otp,
                'otp_expires_at' => $user->otp_expires_at,
            ]]);

            Auth::logout(); // prevent dashboard access until registration is complete

            // Determine where the user left off
            if (!$user->phone || !$user->address || !$user->dob || !$user->country) {
                return redirect()->route('personal.info')
                    ->with('info', 'Complete your personal information to continue.');
            } else {
                return redirect()->route('verify.otp')
                    ->with('info', 'Complete your email verification to continue.');
            }
        }

        // Registration complete and approved, go to dashboard
        return redirect()->intended('dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->withInput();
}


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
