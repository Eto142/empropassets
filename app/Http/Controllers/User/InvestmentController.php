<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Offer;
use App\Models\UserInvestment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvestmentController extends Controller
{


public function index(Request $request)
{
    $query = \App\Models\Investment::query();

    $listing = $request->get('listing', 'investment');
    if ($listing !== 'all') {
        $query->where('listing_type', $listing);
    }

    // Optional filtering by type
    if ($request->has('type') && $request->type != 'all') {
        $query->where('type', $request->type);
    }

    // Paginate results
    $investments = $query->latest()->paginate(9)->withQueryString(); // 9 per page

    return view('user.investment.index', compact('investments', 'listing'));
}


public function show($id)
{
    $investment = Investment::findOrFail($id);

    return view('user.investment.show', compact('investment'));
}


    public function invest(Request $request)
    {
        $validated = $request->validate([
            'investment_id' => 'required|exists:investments,id',
            'shares' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:1',
            'share_price' => 'required|numeric|min:0',
        ]);

        $investment = Investment::findOrFail($request->investment_id);
        $user = auth()->user();

        // Check minimum investment first
        if ($request->amount < $investment->min_investment) {
            return back()->with('error', 'Investment amount must be at least $' . number_format($investment->min_investment, 2) . '.');
        }

        // Check if user has enough balance
        $balance = $user->balance;
        if (!$balance || $balance->cash_balance < $request->amount) {
            return back()->with('error', 'Insufficient balance to complete this investment.');
        }

        // Create the investment record
        UserInvestment::create([
            'user_id'        => $user->id,
            'investment_id'  => $investment->id,
            'shares'         => $request->shares,
            'share_price'    => $request->share_price,
            'amount'         => $request->amount,
            'name'           => $request->investment_name,
            'type'           => $request->investment_type,
            'historic_yield' => $request->historic_yield,
            'total_assets'   => $request->total_assets,
            'min_investment' => $request->min_investment,
            'location'       => $request->location,
            'size'           => $request->size,
            'bedrooms'       => $request->bedrooms,
            'bathrooms'      => $request->bathrooms,
            'parking'        => $request->parking,
            'year_built'     => $request->year_built,
            'amenities'      => $request->amenities,
            'description'    => $request->description,
            'image'          => $request->image,
            'gallery'        => $request->gallery,
            'status'         => 0, // 1 = active, 0 = inactive
        ]);

        // Update user balance
        $balance->cash_balance -= $request->amount;
        $balance->total_invested += $request->amount;
        $balance->save();

        return back()->with('success', 'Investment in progress! You invested $' . number_format($request->amount, 2));
    }

    public function makeOffer(Request $request, $id)
    {
        $investment = Investment::findOrFail($id);

        $data = $request->validate([
            'offer_amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();

        // Save offer to database
        $offer = Offer::create([
            'user_id' => $user->id,
            'investment_id' => $investment->id,
            'property_name' => $investment->name,
            'offer_amount' => $data['offer_amount'],
            'message' => $data['message'] ?? null,
            'status' => 'pending',
        ]);

        // Send email notification to admin
        $adminEmail = 'info@assurehold.com';

        $emailBody = "New Offer Submitted (Offer #$offer->id)\n\n" .
            "Property: {$investment->name}\n" .
            "Listing Type: " . (($investment->listing_type ?? 'investment') === 'for_sale' ? 'For Sale' : 'Investment') . "\n" .
            "Sale Price: $" . number_format($investment->sale_price ?? 0, 2) . "\n" .
            "Offer Amount: $" . number_format($data['offer_amount'], 2) . "\n\n" .
            "From: {$user->name}\n" .
            "Email: {$user->email}\n" .
            "Phone: {$user->phone}\n\n" .
            "Message: " . ($data['message'] ?? 'N/A') . "\n\n" .
            "View offer in admin panel to accept or reject.";

        Mail::raw($emailBody, function ($message) use ($adminEmail, $investment) {
            $message->to($adminEmail)
                ->subject('New Property Offer - ' . $investment->name);
        });

        return back()->with('success', 'Your offer has been submitted successfully! Offer ID: #' . $offer->id . '. A support agent will contact you shortly.');
    }

}
