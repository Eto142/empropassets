<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    // Show register form
    public function showRegistrationForm()
    {
         if (Auth::check()) {
        return redirect()->route('home'); // already logged in
    }

        return view('auth.register');
    }

    // Handle form submission
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:8|confirmed',
    //     ]);
    //     // "confirmed" requires password_confirmation field

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect()->route('login')->with('success', 'Account created successfully!');
    // }


//    public function register(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|unique:users,email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     $otp = rand(100000, 999999);

//     // Store in session
//     session(['register_data' => [
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => bcrypt($request->password),
//         'otp' => $otp,
//         'otp_expires_at' => now()->addMinutes(5),
//     ]]);

//     // Store in DB for resuming later
//     User::updateOrCreate(
//         ['email' => $request->email],
//         [
//             'name' => $request->name,
//             'password' => bcrypt($request->password),
//             'otp' => $otp,
//             'otp_expires_at' => now()->addMinutes(5),
//         ]
//     );

//     Mail::to($request->email)->send(new OtpMail($otp));

//     return redirect()->route('personal.info')
//         ->with('success', 'Verification code sent to your email.');
// }

//     public function personalInfo()
//     {
//         if (!session()->has('register_data')) {
//             return redirect()->route('register');
//         }

//         return view('auth.personal-info');
//     }

//    public function storePersonalInfo(Request $request)
// {
//     $request->validate([
//         'phone' => 'required',
//         'address' => 'required',
//         'dob' => 'required|date',
//         'country' => 'required|string|max:255',
//     ]);

//     session()->put('register_data.phone', $request->phone);
//     session()->put('register_data.address', $request->address);
//     session()->put('register_data.dob', $request->dob);
//     session()->put('register_data.country', $request->country);

//     return redirect()->route('verify.otp');
// }


//     public function showOtpForm()
//     {
//         return view('auth.verify-otp');
//     }

//     public function verifyOtp(Request $request)
// {
//     $request->validate(['otp' => 'required|digits:6']);

//     $data = session('register_data');

//     if (!$data) {
//         return redirect()->route('register');
//     }

//     $user = User::where('email', $data['email'])->first();

//     if (!$user) {
//         return redirect()->route('register');
//     }

//     if (now()->greaterThan($user->otp_expires_at)) {
//         return back()->withErrors(['otp' => 'Verification code expired.']);
//     }

//     if ($request->otp != $user->otp) {
//         return back()->withErrors(['otp' => 'Invalid verification code']);
//     }

//     // Update user with personal info and mark email verified
//     $user->update([
//         'phone' => $data['phone'],
//         'address' => $data['address'],
//         'dob' => $data['dob'],
//         'country' => $data['country'],
//         'email_verified_at' => now(),
//         'otp' => null,
//         'otp_expires_at' => null,
//     ]);

//     session()->forget('register_data');

//     Mail::to($user->email)->send(new WelcomeMail($user));

//     Auth::login($user);

//     return redirect()->route('home');
// }




<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Handle initial registration form submission.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $otp = rand(100000, 999999);

        // Store data in session for multi-step registration
        session(['register_data' => [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]]);

        // Store or update user in DB for resuming registration later
        User::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
            ]
        );

        // Send OTP to email
        Mail::to($request->email)->send(new OtpMail($otp));

        return redirect()->route('personal.info')
            ->with('success', 'Verification code sent to your email.');
    }

    /**
     * Show personal info form.
     */
    public function personalInfo()
    {
        if (!session()->has('register_data')) {
            return redirect()->route('register');
        }

        return view('auth.personal-info');
    }

    /**
     * Store personal info and continue to OTP verification.
     */
    public function storePersonalInfo(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'country' => 'required|string|max:255',
        ]);

        session()->put('register_data.phone', $request->phone);
        session()->put('register_data.address', $request->address);
        session()->put('register_data.dob', $request->dob);
        session()->put('register_data.country', $request->country);

        return redirect()->route('verify.otp');
    }

    /**
     * Show OTP verification form.
     */
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    /**
     * Verify OTP and complete registration.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $data = session('register_data');

        if (!$data) {
            return redirect()->route('register');
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return redirect()->route('register');
        }

        // If OTP expired, generate a new one and resend
        if (now()->greaterThan($user->otp_expires_at)) {
            $otp = rand(100000, 999999);
            $user->update([
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
            ]);

            Mail::to($user->email)->send(new OtpMail($otp));

            session()->put('register_data.otp', $otp);
            session()->put('register_data.otp_expires_at', now()->addMinutes(5));

            return back()->with('success', 'Your OTP expired. A new OTP has been sent to your email.');
        }

        // Check if OTP matches
        if ($request->otp != $user->otp) {
            return back()->withErrors(['otp' => 'Invalid verification code']);
        }

        // Complete registration
        $user->update([
            'phone' => $data['phone'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'country' => $data['country'],
            'email_verified_at' => now(),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        session()->forget('register_data');

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeMail($user));

        // Log the user in
        Auth::login($user);

        return redirect()->route('home');
    }
}

}
