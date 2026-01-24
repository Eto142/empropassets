<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\UserInvestment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //
    public function invest(Request $request)
{
    $investment = Investment::findOrFail($request->investment_id);

    UserInvestment::create([
        'user_id'        => auth()->id(),
        'investment_id' => $investment->id,

        'name'           => $investment->name,
        'type'           => $investment->type,
        'historic_yield'=> $investment->historic_yield,
        'total_assets'  => $investment->total_assets,
        'min_investment'=> $investment->min_investment,
        'image'          => $investment->image,
        'status'         => $investment->status,
    ]);

    return back()->with('success', 'Investment saved successfully!');
}

}
