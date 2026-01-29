<?php

namespace App\Http\Controllers\User;
use App\Models\Balance;
use App\Models\Conversion;
use App\Models\Deposit;
use App\Models\Escrow;
use App\Models\Fiat;
use App\Models\Investment;
use App\Models\PaymentInformation;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
 



public function index()
{
    // Redirect to portfolio as default dashboard

    return redirect()->route('portfolio');
}



public function portfolio()
{
    $userId = auth()->id();

    $balance = Balance::where('user_id', $userId)->first();

    $data = [
        'cash_balance'   => $balance?->cash_balance ?? 0,
        'total_invested'=> $balance?->total_invested ?? 0,
        'total_returns' => $balance?->total_returns ?? 0,
        'total_balance' => ($balance?->cash_balance ?? 0) + ($balance?->total_returns ?? 0),
    ];

    return view('user.portfolio', $data);
}

public function deposit()
{
    return view('user.deposit');
}

public function depositSubmit(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:10',
        'payment_method' => 'required|in:bank,card,crypto',
    ]);

    // Here you would process the deposit
    // For now, just return success message
    
    return back()->with('success', 'Deposit request submitted successfully. Processing...');
}


public function profile()
{
    return view('user.profile');
}


/**
 * Get the BTC price in USD (i.e. 1 BTC = X USD).  
 * You can use CoinGecko, CoinAPI, etc.
 */
protected function getBtcRateInUsd()
{
    // Example using CoinGecko simple price API
    $url = "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd";

    try {
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if (isset($data['bitcoin']['usd'])) {
            return (float) $data['bitcoin']['usd'];
        }
    } catch (\Exception $e) {
        // Log error, fallback
    }

    return 0;
}




 public function gasBilling()
    {
      $conversion = session('conversion'); // get the data from session
      
    // Fetch all available wallets set by the admin
    $wallets = Wallet::all(); // returns a collection of wallet objects
    return view('user.gas-billing', compact('conversion', 'wallets'));  
     
    }

    public function PaymentHistory() {
      
    return view('user.payment-history');  
     
    }

    

 

public function PayOption()
{
    // Existing escrow data for the user
    $escrow = Escrow::where('user_id', Auth::id())->first();

    // Fetch all available wallets set by the admin
    $wallets = Wallet::all(); // returns a collection of wallet objects

    return view('user.pay-option', compact('escrow', 'wallets'));
}


public function ApprovePayment(){

  return view('user.approve-payment');
}

public function Cashout(){

  return view('user.cashout');
}


public function Support(){

  return view('user.support');
}





 public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'identity_type' => 'nullable|string|in:passport,driver_license,national_id,other',
            'identity_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'identity_document_back' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Handle front document upload
        if ($request->hasFile('identity_document')) {
            if ($user->identity_document && Storage::exists('public/' . $user->identity_document)) {
                Storage::delete('public/' . $user->identity_document);
            }
            $filePath = $request->file('identity_document')->store('kyc', 'public');
            $validated['identity_document'] = $filePath;
            $validated['kyc_status'] = 'pending';
            $validated['kyc_rejection_reason'] = null;
        }

        // Handle back document upload
        if ($request->hasFile('identity_document_back')) {
            if ($user->identity_document_back && Storage::exists('public/' . $user->identity_document_back)) {
                Storage::delete('public/' . $user->identity_document_back);
            }
            $filePath = $request->file('identity_document_back')->store('kyc', 'public');
            $validated['identity_document_back'] = $filePath;
            $validated['kyc_status'] = 'pending';
            $validated['kyc_rejection_reason'] = null;
        }

        // Only update basic profile if no file-related KYC fields
        if (!isset($validated['identity_type']) && !isset($validated['identity_document']) && !isset($validated['identity_document_back'])) {
            // Basic profile update only
            $user->update(['name' => $validated['name'], 'phone' => $validated['phone'] ?? null]);
        } else {
            // Full update including KYC
            $user->update($validated);
        }

        return back()->with('success', 'Profile information updated successfully.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password'          => 'required|string',
            'new_password'              => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }


public function UseSupport(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $user = Auth::user(); // logged-in user
        $adminEmail = "info@assurehold.com"; // change to your admin email

        // Send mail directly without mailable template
        Mail::raw("New Support Request\n\nFrom: {$user->name} ({$user->email})\n\nSubject: {$request->subject}\n\nMessage:\n{$request->message}", function ($message) use ($adminEmail, $request) {
            $message->to($adminEmail)
                    ->subject('Support Request: ' . $request->subject);
        });

        return back()->with('success', 'Your support message has been sent successfully!');
    }



  }



