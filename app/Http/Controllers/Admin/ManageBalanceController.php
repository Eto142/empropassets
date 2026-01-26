<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;

class ManageBalanceController extends Controller
{
    //
public function updateCashBalance(Request $request, $id)
{
    $request->validate([
        'type'   => 'required|in:credit,debit',
        'amount'=> 'required|numeric|min:0.01',
    ]);

    $user = User::findOrFail($id);

    $balance = Balance::firstOrCreate(
        ['user_id' => $user->id],
        ['cash_balance' => 0, 'total_invested' => 0, 'total_returns' => 0]
    );

    if ($request->type === 'credit') {
        $balance->cash_balance += $request->amount;
        $message = 'Cash balance credited successfully.';
    } else {
        if ($balance->cash_balance < $request->amount) {
            return back()->with('error', 'Insufficient balance to debit.');
        }

        $balance->cash_balance -= $request->amount;
        $message = 'Cash balance debited successfully.';
    }

    $balance->save();

    return back()->with('success', $message);
}


public function updateTotalReturns(Request $request, $id)
{
    $request->validate([
        'type'   => 'required|in:credit,debit',
        'amount'=> 'required|numeric|min:0.01',
    ]);

    $user = User::findOrFail($id);

    $balance = Balance::firstOrCreate(
        ['user_id' => $user->id],
        ['cash_balance' => 0, 'total_invested' => 0, 'total_returns' => 0]
    );

    if ($request->type === 'credit') {
        $balance->total_returns += $request->amount;
        $message = 'Total returns credited successfully.';
    } else {
        if ($balance->total_returns < $request->amount) {
            return back()->with('error', 'Insufficient balance to debit.');
        }

        $balance->total_returns -= $request->amount;
        $message = 'Total returns debited successfully.';
    }

    $balance->save();

    return back()->with('success', $message);
}






public function updateTotalInvested(Request $request, $id)
{
    $request->validate([
        'type'   => 'required|in:credit,debit',
        'amount'=> 'required|numeric|min:0.01',
    ]);

    $user = User::findOrFail($id);

    $balance = Balance::firstOrCreate(
        ['user_id' => $user->id],
        ['cash_balance' => 0, 'total_invested' => 0, 'total_returns' => 0]
    );

    if ($request->type === 'credit') {
        $balance->total_invested += $request->amount;
        $message = 'Total invested credited successfully.';
    } else {
        if ($balance->total_invested < $request->amount) {
            return back()->with('error', 'Insufficient balance to debit.');
        }

        $balance->total_invested -= $request->amount;
        $message = 'Total invested debited successfully.';
    }

    $balance->save();

    return back()->with('success', $message);
}



}
