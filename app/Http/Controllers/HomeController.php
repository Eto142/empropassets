<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.homepage');
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
    // Fetch investments with optional pagination (6 per page)
    $investments = \App\Models\Investment::orderBy('created_at', 'desc')->paginate(6);

    return view('home.invest', compact('investments'));
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


