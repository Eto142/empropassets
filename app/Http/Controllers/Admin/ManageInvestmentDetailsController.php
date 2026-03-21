<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManageInvestmentDetailsController extends Controller
{
    public function index()
    {
        $investments = Investment::latest()->paginate(10);
        return view('admin.investments.index', compact('investments'));
    }

    public function create()
    {
        return view('admin.investments.create');
    }

    public function edit(Investment $investment)
    {
        return view('admin.investments.edit', compact('investment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'listing_type'   => 'required|in:investment,for_sale',
            'type'           => 'required|string|max:255',
            'name'           => 'required|string|max:255',
            'location'       => 'nullable|string|max:255',
            'historic_yield' => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'total_assets'   => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'sale_price'     => [Rule::requiredIf($request->listing_type === 'for_sale'), 'nullable', 'numeric'],
            'min_investment' => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'share_price'    => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'investors'      => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'integer'],
            'size'           => 'nullable|numeric',
            'bedrooms'       => 'nullable|integer',
            'bathrooms'      => 'nullable|integer',
            'parking'        => 'nullable|integer',
            'year_built'     => 'nullable|integer',
            'description'    => 'nullable|string',
            'amenities'      => 'nullable|array',
            'amenities.*'    => 'string|max:255',
            'image'          => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'gallery.*'      => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'status'         => 'required|in:available,closed',
        ]);

        // Build clean scalar data (no UploadedFile objects)
        $data = $request->only([
            'listing_type','type','name','location','historic_yield','total_assets',
            'sale_price','min_investment','share_price','investors','size','bedrooms',
            'bathrooms','parking','year_built','description','amenities','status',
        ]);

        if ($data['listing_type'] === 'for_sale') {
            $data['historic_yield'] = $data['historic_yield'] ?? 0;
            $data['total_assets']   = $data['total_assets'] ?? 0;
            $data['min_investment'] = $data['min_investment'] ?? 0;
            $data['share_price']    = $data['share_price'] ?? 0;
            $data['investors']      = $data['investors'] ?? 0;
        } else {
            $data['historic_yield'] = $data['historic_yield'] ?? 0;
            $data['total_assets']   = $data['total_assets'] ?? 0;
            $data['min_investment'] = $data['min_investment'] ?? 0;
            $data['investors']      = $data['investors'] ?? 0;
        }

        // Upload main image to Cloudinary
        if ($request->hasFile('image')) {
            $result = $this->cloudinary()->uploadApi()->upload($request->file('image')->getRealPath(), [
                'folder'  => 'investments',
                'timeout' => 120,
            ]);
            $data['image'] = $result['secure_url'];
        }

        // Upload gallery images to Cloudinary
        if ($request->hasFile('gallery')) {
            $galleryUrls = [];
            foreach ($request->file('gallery') as $img) {
                $result = $this->cloudinary()->uploadApi()->upload($img->getRealPath(), [
                    'folder'  => 'investments/gallery',
                    'timeout' => 120,
                ]);
                $galleryUrls[] = $result['secure_url'];
            }
            $data['gallery'] = $galleryUrls;
        }

        Investment::create($data);

        return redirect()->route('admin.investments.index')->with('success', 'Investment created successfully');
    }

    public function update(Request $request, Investment $investment)
    {
        $request->validate([
            'listing_type'   => 'required|in:investment,for_sale',
            'type'           => 'required|string|max:255',
            'name'           => 'required|string|max:255',
            'location'       => 'nullable|string|max:255',
            'historic_yield' => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'total_assets'   => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'sale_price'     => [Rule::requiredIf($request->listing_type === 'for_sale'), 'nullable', 'numeric'],
            'min_investment' => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'share_price'    => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'numeric'],
            'investors'      => [Rule::requiredIf($request->listing_type === 'investment'), 'nullable', 'integer'],
            'size'           => 'nullable|numeric',
            'bedrooms'       => 'nullable|integer',
            'bathrooms'      => 'nullable|integer',
            'parking'        => 'nullable|integer',
            'year_built'     => 'nullable|integer',
            'description'    => 'nullable|string',
            'amenities'      => 'nullable|array',
            'amenities.*'    => 'string|max:255',
            'image'          => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'gallery.*'      => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'status'         => 'required|in:available,closed',
        ]);

        // Build clean scalar data (no UploadedFile objects)
        $data = $request->only([
            'listing_type','type','name','location','historic_yield','total_assets',
            'sale_price','min_investment','share_price','investors','size','bedrooms',
            'bathrooms','parking','year_built','description','amenities','status',
        ]);

        if ($data['listing_type'] === 'for_sale') {
            $data['historic_yield'] = $data['historic_yield'] ?? 0;
            $data['total_assets']   = $data['total_assets'] ?? 0;
            $data['min_investment'] = $data['min_investment'] ?? 0;
            $data['share_price']    = $data['share_price'] ?? 0;
            $data['investors']      = $data['investors'] ?? 0;
        } else {
            $data['historic_yield'] = $data['historic_yield'] ?? 0;
            $data['total_assets']   = $data['total_assets'] ?? 0;
            $data['min_investment'] = $data['min_investment'] ?? 0;
            $data['investors']      = $data['investors'] ?? 0;
        }

        // Replace main image on Cloudinary
        if ($request->hasFile('image')) {
            if ($investment->image) {
                $this->cloudinary()->uploadApi()->destroy($this->extractPublicId($investment->image));
            }
            $result = $this->cloudinary()->uploadApi()->upload($request->file('image')->getRealPath(), [
                'folder'  => 'investments',
                'timeout' => 120,
            ]);
            $data['image'] = $result['secure_url'];
        }

        // Replace gallery images on Cloudinary
        if ($request->hasFile('gallery')) {
            if ($investment->gallery) {
                foreach ($investment->gallery as $url) {
                    $this->cloudinary()->uploadApi()->destroy($this->extractPublicId($url));
                }
            }
            $galleryUrls = [];
            foreach ($request->file('gallery') as $img) {
                $result = $this->cloudinary()->uploadApi()->upload($img->getRealPath(), [
                    'folder'  => 'investments/gallery',
                    'timeout' => 120,
                ]);
                $galleryUrls[] = $result['secure_url'];
            }
            $data['gallery'] = $galleryUrls;
        }

        $investment->update($data);

        return redirect()->route('admin.investments.index')->with('success', 'Investment updated successfully');
    }

    public function destroy(Investment $investment)
    {
        if ($investment->image) {
            $this->cloudinary()->uploadApi()->destroy($this->extractPublicId($investment->image));
        }
        if ($investment->gallery) {
            foreach ($investment->gallery as $url) {
                $this->cloudinary()->uploadApi()->destroy($this->extractPublicId($url));
            }
        }

        $investment->delete();

        return redirect()->back()->with('success', 'Investment deleted successfully');
    }

    private function cloudinary(): \Cloudinary\Cloudinary
    {
        return new \Cloudinary\Cloudinary(config('filesystems.disks.cloudinary.url'));
    }

    /**
     * Extract the Cloudinary public_id from a secure URL.
     * e.g. https://res.cloudinary.com/demo/image/upload/v123/investments/abc.jpg → investments/abc
     */
    private function extractPublicId(string $url): string
    {
        if (preg_match('/\/upload\/(?:v\d+\/)?(.+)\.[a-z]+$/i', $url, $matches)) {
            return $matches[1];
        }
        return $url;
    }
}

