<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManageOffersController extends Controller
{
    public function index()
    {
        $offers = Offer::with(['user', 'investment'])
            ->latest()
            ->paginate(20);

        return view('admin.offers.index', compact('offers'));
    }

    public function show($id)
    {
        $offer = Offer::with(['user', 'investment'])->findOrFail($id);

        return view('admin.offers.show', compact('offer'));
    }

    public function accept(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        $request->validate([
            'response' => 'nullable|string|max:1000',
        ]);

        $offer->update([
            'status' => 'accepted',
            'admin_response' => $request->response ?? 'Your offer has been accepted.',
        ]);

        // Send email to user
        $user = $offer->user;
        $emailBody = "Your Offer Has Been Accepted!\n\n" .
            "Offer ID: #{$offer->id}\n" .
            "Property: {$offer->property_name}\n" .
            "Your Offer: $" . number_format($offer->offer_amount, 2) . "\n\n" .
            "Response from Admin:\n{$offer->admin_response}\n\n" .
            "A support agent will contact you at {$user->email} or {$user->phone} to proceed with the sale.";

        Mail::raw($emailBody, function ($message) use ($user, $offer) {
            $message->to($user->email)
                ->subject('Offer Accepted - ' . $offer->property_name);
        });

        return back()->with('success', 'Offer accepted and user notified.');
    }

    public function reject(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        $request->validate([
            'response' => 'required|string|max:1000',
        ]);

        $offer->update([
            'status' => 'rejected',
            'admin_response' => $request->response,
        ]);

        // Send email to user
        $user = $offer->user;
        $emailBody = "Your Offer Has Been Declined\n\n" .
            "Offer ID: #{$offer->id}\n" .
            "Property: {$offer->property_name}\n" .
            "Your Offer: $" . number_format($offer->offer_amount, 2) . "\n\n" .
            "Response from Admin:\n{$offer->admin_response}\n\n" .
            "You may submit a new offer or contact us at info@assurehold.com for more information.";

        Mail::raw($emailBody, function ($message) use ($user, $offer) {
            $message->to($user->email)
                ->subject('Offer Update - ' . $offer->property_name);
        });

        return back()->with('success', 'Offer rejected and user notified.');
    }
}
