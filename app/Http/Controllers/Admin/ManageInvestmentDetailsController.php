<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class ManageInvestmentDetailsController extends Controller
{
    public function index()
    {
        $investments = Investment::latest()->paginate(10);
        return view('admin.investments.index', compact('investments'));
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'type' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'historic_yield' => 'required|numeric',
    //         'total_assets' => 'required|numeric',
    //         'min_investment' => 'required|numeric',
    //         'investors' => 'required|integer',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'status' => 'required|in:available,closed'
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('investments', 'public');
    //     }

    //     Investment::create($data);

    //     return redirect()->back()->with('success', 'Investment created successfully');
    // }

    // public function update(Request $request, Investment $investment)
    // {
    //     $data = $request->validate([
    //         'type' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'historic_yield' => 'required|numeric',
    //         'total_assets' => 'required|numeric',
    //         'min_investment' => 'required|numeric',
    //         'investors' => 'required|integer',
    //         'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         'status' => 'required|in:available,closed'
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('investments', 'public');
    //     }

    //     $investment->update($data);

    //     return redirect()->back()->with('success', 'Investment updated successfully');
    // }


    public function store(Request $request)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'historic_yield' => 'required|numeric',
        'total_assets' => 'required|numeric',
        'min_investment' => 'required|numeric',
        'investors' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:available,closed'
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/investments'), $imageName);
        $data['image'] = $imageName; // Save only the filename
    }

    Investment::create($data);

    return redirect()->back()->with('success', 'Investment created successfully');
}

public function update(Request $request, Investment $investment)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'historic_yield' => 'required|numeric',
        'total_assets' => 'required|numeric',
        'min_investment' => 'required|numeric',
        'investors' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:available,closed'
    ]);

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/investments'), $imageName);
        $data['image'] = $imageName; // Save only the filename
    }

    $investment->update($data);

    return redirect()->back()->with('success', 'Investment updated successfully');
}


    public function destroy(Investment $investment)
    {
        $investment->delete();

        return redirect()->back()->with('success', 'Investment deleted successfully');
    }
}
