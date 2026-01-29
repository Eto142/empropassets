<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Balance;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    // GET: show the deposit form
    public function showForm()
    {
         $userId = auth()->id();

    $balance = Balance::where('user_id', $userId)->first();

    $data = [
        'cash_balance'   => $balance?->cash_balance ?? 0,
        'total_invested'=> $balance?->total_invested ?? 0,
        'total_returns' => $balance?->total_returns ?? 0,
        'total_balance' => ($balance?->cash_balance ?? 0) + ($balance?->total_returns ?? 0),
    ];
        return view('user.deposit.index', $data); // your Blade form
    }

    // POST: handle form submission and redirect to the next page
    public function getDeposit(Request $request)
    {
        // Validate input
        $request->validate([
            'payment_method' => 'required|in:bank,crypto',
            'amount' => 'required|numeric|min:10',
            'crypto_type' => 'nullable|in:Bitcoin,Ethereum,USDT,USDC',
        ]);

        $method = $request->payment_method;
        $amount = $request->amount;
        $crypto = $request->crypto_type ?? null;

        // Redirect based on selected payment method
        if ($method === 'bank') {
            return redirect()->route('deposit.bank', ['amount' => $amount]);
        }

        if ($method === 'crypto') {
            return redirect()->route('deposit.crypto', [
                'amount' => $amount,
                'crypto' => $crypto
            ]);
        }

        return redirect()->back()->with('error', 'Invalid payment method.');
    }



//  public function makeDeposit(Request $request)
// {
//     // Validate request
//     $request->validate([
//         'payment_method' => 'required|in:bank,crypto',
//         'amount' => 'required|numeric|min:10',
//         'crypto_type' => 'nullable|required_if:payment_method,crypto|in:Bitcoin,Ethereum,USDT,USDC',
//         'proof' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:4096',
//         'bank_name' => 'nullable|required_if:payment_method,bank|string|max:255',
//         'account_number' => 'nullable|required_if:payment_method,bank|string|max:50',
//     ]);

//     // Handle proof upload
//     $proofPath = null;
//     if ($request->hasFile('proof')) {
//         $proofPath = $request->file('proof')->store('deposit_proofs', 'public');
//     }

//     // Save deposit
//     Deposit::create([
//         'user_id' => auth()->id(),
//         'amount' => $request->amount,
//         'payment_method' => $request->payment_method,
//         'crypto_type' => $request->crypto_type,
//         'bank_name' => $request->bank_name,
//         'account_number' => $request->account_number,
//         'proof' => $proofPath,
//         'status' => 0, // pending
//     ]);

//     return redirect()->route('deposit.form')
//         ->with('success', 'Deposit submitted successfully. Awaiting confirmation.');
// }




public function makeDeposit(Request $request)
{
    $request->validate([
        'payment_method' => 'required|in:bank,crypto',
        'amount' => 'required|numeric|min:10',
        'crypto_type' => 'nullable|required_if:payment_method,crypto|in:Bitcoin,Ethereum,USDT,USDC',
        'proof' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:4096',
        'bank_name' => 'nullable|required_if:payment_method,bank|string|max:255',
        'account_number' => 'nullable|required_if:payment_method,bank|string|max:50',
    ]);

    // Handle proof upload
    $proofPath = null;
    if ($request->hasFile('proof')) {
        $proofPath = $request->file('proof')->store('deposit_proofs', 'public');
    }

    // Save deposit
    $deposit = Deposit::create([
        'user_id' => auth()->id(),
        'amount' => $request->amount,
        'payment_method' => $request->payment_method,
        'crypto_type' => $request->crypto_type,
        'bank_name' => $request->bank_name,
        'account_number' => $request->account_number,
        'proof' => $proofPath,
        'status' => 0,
    ]);

    // Log transaction
    $transaction = new \App\Models\Transaction();
    $transaction->user_id = auth()->id();
    $transaction->transaction_id = uniqid('txn_'); // unique transaction ID
    $transaction->transaction_type = 'Credit';
    $transaction->transaction = 'credit';
    $transaction->credit = $request->amount;
    $transaction->debit = 0;
    $transaction->status = 0; // pending
    $transaction->save();

    return redirect()->route('deposit.form')
        ->with('success', 'Deposit submitted successfully. Awaiting confirmation.');
}





    // Bank instructions page
    public function bank($amount)
    {
        return view('user.deposit.bank', compact('amount'));
    }

    // Crypto instructions page
    public function crypto($amount, $crypto)
    {
        return view('user.deposit.crypto', compact('amount', 'crypto'));
    }
}
