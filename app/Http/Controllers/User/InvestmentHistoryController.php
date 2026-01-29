<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\UserInvestment;
use Illuminate\Http\Request;

class InvestmentHistoryController extends Controller
{
    public function investmentHistory()
    {
        $userId = auth()->id();
        $balance = Balance::where('user_id', $userId)->first();

        // Fetch all transactions
        $deposits = Deposit::where('user_id', $userId)->latest()->get();
        $withdrawals = Withdrawal::where('user_id', $userId)->latest()->get();
        $investments = UserInvestment::where('user_id', $userId)->latest()->get();

        // Build all transactions merged
        $allTransactions = collect();

        foreach ($deposits as $deposit) {
            $allTransactions->push([
                'type' => 'deposit',
                'date' => $deposit->created_at,
                'description' => ucfirst($deposit->payment_method),
                'amount' => $deposit->amount,
                'status' => $deposit->status,
                'status_text' => $this->getDepositStatus($deposit->status),
                'icon' => '💰',
            ]);
        }

        foreach ($withdrawals as $withdrawal) {
            $allTransactions->push([
                'type' => 'withdrawal',
                'date' => $withdrawal->created_at,
                'description' => ucfirst($withdrawal->withdrawal_type),
                'amount' => -$withdrawal->amount,
                'status' => $withdrawal->status,
                'status_text' => $this->getWithdrawalStatus($withdrawal->status),
                'icon' => '📤',
            ]);
        }

        foreach ($investments as $investment) {
            $allTransactions->push([
                'type' => 'investment',
                'date' => $investment->created_at,
                'description' => $investment->name,
                'amount' => -$investment->amount,
                'status' => $investment->status,
                'status_text' => $investment->status == 1 ? 'Active' : 'Pending',
                'icon' => '📈',
            ]);
        }

        $allTransactions = $allTransactions->sortByDesc('date')->values();

        $data = [
            'cash_balance'      => $balance?->cash_balance ?? 0,
            'total_invested'    => $balance?->total_invested ?? 0,
            'total_returns'     => $balance?->total_returns ?? 0,
            'total_balance'     => ($balance?->cash_balance ?? 0) + ($balance?->total_returns ?? 0),
            'deposits'          => $deposits,
            'withdrawals'       => $withdrawals,
            'investments'       => $investments,
            'allTransactions'   => $allTransactions,
        ];
        return view('user.investment-history', $data);
    }

    private function getDepositStatus($status)
    {
        return match($status) {
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Rejected',
            default => 'Unknown'
        };
    }

    private function getWithdrawalStatus($status)
    {
        return match($status) {
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Rejected',
            default => 'Unknown'
        };
    }
}
