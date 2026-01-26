<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use Illuminate\Http\Request;

class InvestmentHistoryController extends Controller
{
    //
    public function investmentHistory()
{
     $userId = auth()->id();

    $balance = Balance::where('user_id', $userId)->first();

    $data = [
        'cash_balance'   => $balance?->cash_balance ?? 0,
        'total_invested'=> $balance?->total_invested ?? 0,
        'total_returns' => $balance?->total_returns ?? 0,
        'total_balance' => ($balance?->cash_balance ?? 0) + ($balance?->total_returns ?? 0) - ($balance?->total_invested ?? 0),
    ];
    return view('user.investment-history', $data);
}
}
