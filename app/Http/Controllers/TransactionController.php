<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function usersTransaction(Request $request)
    {
        $user_transactions = Transaction::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        $totalCredit = Transaction::sum('credit');
        $totalDebit = Transaction::sum('debit');
        $netTotal = $totalCredit - $totalDebit;

        return view('admin.manage_transactions', compact('user_transactions', 'totalCredit', 'totalDebit', 'netTotal'));
    }
}
