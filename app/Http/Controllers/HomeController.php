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
        return view('home.invest');
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


