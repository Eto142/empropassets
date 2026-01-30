<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Submit the forgot password form
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $user = User::where('email', $request->email)->first();

        // Generate a unique reset token
        $token = Str::random(64);

        // Store the token in database
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send email with reset link
        $resetLink = route('reset.password.form', ['token' => $token]);
        
        $emailContent = "
            Hello {$user->name},

            You requested a password reset. Click the link below to reset your password:
            
            {$resetLink}

            This link will expire in 60 minutes.

            If you did not request this, please ignore this email.

            Best regards,
            EMAAR Properties Assets Team
        ";

        Mail::raw($emailContent, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Password Reset Request - EMAAR Properties Assets');
        });

        return back()->with('status', 'We have sent you an email with password reset link. Please check your email.');
    }

    /**
     * Show the reset password form
     */
    public function showResetPasswordForm($token)
    {
        // Check if token exists and is not expired (60 minutes)
        $reset = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', now()->subMinutes(60))
            ->first();

        if (!$reset) {
            return redirect()->route('forgot.password.form')->with('error', 'Password reset link has expired or is invalid.');
        }

        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Submit the reset password form
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'token' => 'required'
        ]);

        // Check if token exists and is valid
        $reset = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->where('created_at', '>', now()->subMinutes(60))
            ->first();

        if (!$reset) {
            return back()->with('error', 'Password reset token is invalid or expired.');
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        // Delete the used token
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully. Please login with your new password.');
    }
}
