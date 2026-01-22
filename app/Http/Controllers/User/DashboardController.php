<?php

namespace App\Http\Controllers\User;
use App\Models\Conversion;
use App\Models\Deposit;
use App\Models\Escrow;
use App\Models\Fiat;
use App\Models\PaymentInformation;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
 



public function index()
{
    // Redirect to portfolio as default dashboard
    return redirect()->route('portfolio');
}

public function invest()
{
    return view('user.invest');
}

public function portfolio()
{
    return view('user.portfolio');
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

public function withdrawal()
{
    return view('user.withdrawal');
}

public function withdrawalSubmit(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:10',
        'withdrawal_type' => 'required|in:bank,crypto',
    ]);

    if ($request->withdrawal_type === 'bank') {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
            'swift_code' => 'nullable|string|max:50',
        ]);
    } else {
        $request->validate([
            'crypto_network' => 'required|string|max:100',
            'wallet_address' => 'required|string|max:255',
        ]);
    }

    // Here you would process the withdrawal
    // For now, just return success message
    
    return back()->with('success', 'Withdrawal request submitted successfully. It will be processed within 3-5 business days.');
}

public function profile()
{
    return view('user.profile');
}

public function investmentHistory()
{
    return view('user.investment-history');
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
        ]);

        $user->update($validated);

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



