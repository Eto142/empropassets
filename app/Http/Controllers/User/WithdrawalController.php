<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{


public function index()
{
     $userId = auth()->id();

    $balance = Balance::where('user_id', $userId)->first();

    $data = [
        'cash_balance'   => $balance?->cash_balance ?? 0,
        'total_invested'=> $balance?->total_invested ?? 0,
        'total_returns' => $balance?->total_returns ?? 0,
        'total_balance' => ($balance?->cash_balance ?? 0) + ($balance?->total_returns ?? 0),
    ];
    return view('user.withdrawal.index', $data);
}
    /**
     * Handle withdrawal form submission.
     */
  public function withdrawalSubmit(Request $request)
{
    // Validate input
   $validator = Validator::make($request->all(), [
    'withdrawal_type' => 'required|in:bank,crypto',
    'amount' => 'required|numeric|min:10',

    // Bank fields
    'bank_name' => 'nullable|required_if:withdrawal_type,bank|string|max:255',
    'account_name' => 'nullable|required_if:withdrawal_type,bank|string|max:255',
    'account_number' => 'nullable|required_if:withdrawal_type,bank|string|max:255',
    'swift_code' => 'nullable|required_if:withdrawal_type,bank|string|max:255',

    // Crypto fields
    'crypto_network' => 'nullable|required_if:withdrawal_type,crypto|string|max:50',
    'wallet_address' => 'nullable|required_if:withdrawal_type,crypto|string|max:255',

    'narration' => 'nullable|string|max:1000',
]);


    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Save withdrawal
    $withdrawal = Withdrawal::create([
        'user_id' => Auth::id(),
        'withdrawal_type' => $request->withdrawal_type,
        'amount' => $request->amount,

        // Bank fields are null if not bank withdrawal
        'bank_name' => $request->withdrawal_type === 'bank' ? $request->bank_name : null,
        'account_name' => $request->withdrawal_type === 'bank' ? $request->account_name : null,
        'account_number' => $request->withdrawal_type === 'bank' ? $request->account_number : null,
        'swift_code' => $request->withdrawal_type === 'bank' ? $request->swift_code : null,

        // Crypto fields are null if not crypto withdrawal
        'crypto_network' => $request->withdrawal_type === 'crypto' ? $request->crypto_network : null,
        'wallet_address' => $request->withdrawal_type === 'crypto' ? $request->wallet_address : null,

        'narration' => $request->narration,
        'status' => 0,
    ]);

    return redirect()->back()->with('success', 'Withdrawal request submitted successfully!');
}



}


