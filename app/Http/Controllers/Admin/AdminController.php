<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserInvestment;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index (){

        // User Statistics
        $newUsersCount = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $totalUsersCount = User::count();

        // Deposit Statistics
        $totalDeposits = Deposit::sum('amount');
        $totalDepositsCount = Deposit::count();
        $pendingDepositsCount = Deposit::where('status', 0)->count();
        $approvedDepositsCount = Deposit::where('status', 1)->count();

        // Withdrawal Statistics
        $totalWithdrawals = Withdrawal::sum('amount');
        $totalWithdrawalsCount = Withdrawal::count();
        $pendingWithdrawalsCount = Withdrawal::where('status', 0)->count();
        $approvedWithdrawalsCount = Withdrawal::where('status', 1)->count();

        // Investment Statistics
        $totalInvestments = UserInvestment::sum('amount');
        $totalInvestmentsCount = UserInvestment::count();
        $activeInvestmentsCount = UserInvestment::where('status', 1)->count();
        $pendingInvestmentsCount = UserInvestment::where('status', 0)->count();

        // Balance Statistics
        $totalCashBalance = Balance::sum('cash_balance');
        $totalReturns = Balance::sum('total_returns');
        $totalInvested = Balance::sum('total_invested');

        // Recent Activity
        $recentUsers = User::latest()->take(5)->get();
        $recentDeposits = Deposit::with('user')->latest()->take(5)->get();
        $recentWithdrawals = Withdrawal::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'newUsersCount',
            'totalUsersCount',
            'totalDeposits',
            'totalDepositsCount',
            'pendingDepositsCount',
            'approvedDepositsCount',
            'totalWithdrawals',
            'totalWithdrawalsCount',
            'pendingWithdrawalsCount',
            'approvedWithdrawalsCount',
            'totalInvestments',
            'totalInvestmentsCount',
            'activeInvestmentsCount',
            'pendingInvestmentsCount',
            'totalCashBalance',
            'totalReturns',
            'totalInvested',
            'recentUsers',
            'recentDeposits',
            'recentWithdrawals'
        ));
     
    }

}
