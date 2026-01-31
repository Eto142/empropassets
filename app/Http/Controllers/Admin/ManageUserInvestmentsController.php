<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserInvestment;
use Illuminate\Http\Request;

class ManageUserInvestmentsController extends Controller
{
    public function index()
    {
        $investments = UserInvestment::with(['user', 'investment'])
            ->latest()
            ->paginate(20);

        return view('admin.user-investments.index', compact('investments'));
    }

    public function show($id)
    {
        $investment = UserInvestment::with(['user', 'investment'])->findOrFail($id);

        return view('admin.user-investments.show', compact('investment'));
    }
}
