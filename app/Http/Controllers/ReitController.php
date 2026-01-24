<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReitController extends Controller
{
    /**
     * Display the main REIT landing page
     */
    public function index()
    {
        return view('home.reit');
    }

    /**
     * Display Income REIT page
     */
    public function incomeReit()
    {
        return view('home.reit-income');
    }

    /**
     * Display Growth REIT page
     */
    public function growthReit()
    {
        return view('home.reit-growth');
    }

    /**
     * Display Why REIT page
     */
    public function whyReit()
    {
        return view('home.reit-why');
    }
}
