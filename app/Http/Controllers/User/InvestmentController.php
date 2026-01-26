<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\UserInvestment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{


public function index(Request $request)
{
    $query = \App\Models\Investment::query();

    // Optional filtering by type
    if ($request->has('type') && $request->type != 'all') {
        $query->where('type', $request->type);
    }

    // Paginate results
    $investments = $query->latest()->paginate(9)->withQueryString(); // 9 per page

    return view('user.investment.index', compact('investments'));
}


public function show($id)
{
    $investment = Investment::findOrFail($id);

    return view('user.investment.show', compact('investment'));
}


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
