<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch latest properties for homepage (3 investments + 3 for sale)
        $featuredInvestments = \App\Models\Investment::where('listing_type', 'investment')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        $featuredForSale = \App\Models\Investment::where('listing_type', 'for_sale')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home.homepage', compact('featuredInvestments', 'featuredForSale'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function learn()
    {
        return view('home.learn');
    }

    public function invest()
{
    // Fetch investments with optional type and listing filter
    $query = \App\Models\Investment::query();
    
    // Filter by listing type (investment/for_sale/all)
    $listingType = request('listing', 'all');
    if ($listingType !== 'all') {
        $query->where('listing_type', $listingType);
    }
    
    // Filter by property type
    if (request()->has('type') && request('type') !== 'all') {
        $query->where('type', request('type'));
    }
    
    $investments = $query->orderBy('created_at', 'desc')->paginate(6);

    return view('home.invest', compact('investments', 'listingType'));
}


    public function terms()
    {
        return view('home.terms');
    }

    public function privacy()
    {
        return view('home.privacy');
    }

    public function careers()
    {
        return view('home.careers');
    }
}


