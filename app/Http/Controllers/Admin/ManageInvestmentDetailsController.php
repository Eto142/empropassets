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

   

public function store(Request $request)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'historic_yield' => 'required|numeric',
        'total_assets' => 'required|numeric',
        'min_investment' => 'required|numeric',
        'share_price' => 'nullable|numeric',
        'investors' => 'required|integer',
        'size' => 'nullable|numeric',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'parking' => 'nullable|integer',
        'year_built' => 'nullable|integer',
        'description' => 'nullable|string',
        'amenities' => 'nullable|array',
        'amenities.*' => 'string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:available,closed',
    ]);

    // Handle main image
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/investments'), $imageName);
        $data['image'] = $imageName;
    }

    // Handle gallery images
    if ($request->hasFile('gallery')) {
        $galleryNames = [];
        foreach ($request->file('gallery') as $img) {
            $name = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('images/investments/gallery'), $name);
            $galleryNames[] = $name;
        }
        $data['gallery'] = json_encode($galleryNames);
    }

    // Amenities as JSON
    if (!empty($data['amenities'])) {
        $data['amenities'] = json_encode($data['amenities']);
    }

    Investment::create($data);

    return redirect()->back()->with('success', 'Investment created successfully');
}


public function update(Request $request, Investment $investment)
{
    $data = $request->validate([
        'type' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'historic_yield' => 'required|numeric',
        'total_assets' => 'required|numeric',
        'min_investment' => 'required|numeric',
        'share_price' => 'nullable|numeric',
        'investors' => 'required|integer',
        'size' => 'nullable|numeric',
        'bedrooms' => 'nullable|integer',
        'bathrooms' => 'nullable|integer',
        'parking' => 'nullable|integer',
        'year_built' => 'nullable|integer',
        'description' => 'nullable|string',
        'amenities' => 'nullable|array',
        'amenities.*' => 'string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:available,closed',
    ]);

    // Main image
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/investments'), $imageName);
        $data['image'] = $imageName;
    }

    // Gallery
    if ($request->hasFile('gallery')) {
        $galleryNames = [];
        foreach ($request->file('gallery') as $img) {
            $name = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('images/investments/gallery'), $name);
            $galleryNames[] = $name;
        }
        $data['gallery'] = json_encode($galleryNames);
    }

    // Amenities
    if (!empty($data['amenities'])) {
        $data['amenities'] = json_encode($data['amenities']);
    }

    $investment->update($data);

    return redirect()->back()->with('success', 'Investment updated successfully');
}


public function destroy(Investment $investment)
{
    // Optionally delete images from storage
    if ($investment->image && file_exists(public_path('images/investments/'.$investment->image))) {
        unlink(public_path('images/investments/'.$investment->image));
    }
    if ($investment->gallery) {
        foreach (json_decode($investment->gallery) as $img) {
            if (file_exists(public_path('images/investments/gallery/'.$img))) {
                unlink(public_path('images/investments/gallery/'.$img));
            }
        }
    }

    $investment->delete();

    return redirect()->back()->with('success', 'Investment deleted successfully');
}

}