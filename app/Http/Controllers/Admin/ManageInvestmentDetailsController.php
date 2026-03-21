<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
            $data['image'] = $this->cloudinaryUpload(
                $request->file('image')->getRealPath(),
                'investments'
            );
        }

        // Upload gallery images to Cloudinary
        if ($request->hasFile('gallery')) {
            $galleryUrls = [];
            foreach ($request->file('gallery') as $img) {
                $galleryUrls[] = $this->cloudinaryUpload($img->getRealPath(), 'investments/gallery');
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
                $this->cloudinaryDestroy($this->extractPublicId($investment->image));
            }
            $data['image'] = $this->cloudinaryUpload(
                $request->file('image')->getRealPath(),
                'investments'
            );
        }

        // Replace gallery images on Cloudinary
        if ($request->hasFile('gallery')) {
            if ($investment->gallery) {
                foreach ($investment->gallery as $url) {
                    $this->cloudinaryDestroy($this->extractPublicId($url));
                }
            }
            $galleryUrls = [];
            foreach ($request->file('gallery') as $img) {
                $galleryUrls[] = $this->cloudinaryUpload($img->getRealPath(), 'investments/gallery');
            }
            $data['gallery'] = $galleryUrls;
        }

        $investment->update($data);

        return redirect()->route('admin.investments.index')->with('success', 'Investment updated successfully');
    }

    public function destroy(Investment $investment)
    {
        if ($investment->image) {
            $this->cloudinaryDestroy($this->extractPublicId($investment->image));
        }
        if ($investment->gallery) {
            foreach ($investment->gallery as $url) {
                $this->cloudinaryDestroy($this->extractPublicId($url));
            }
        }

        $investment->delete();

        return redirect()->back()->with('success', 'Investment deleted successfully');
    }

    private function cloudinaryCredentials(): array
    {
        $url = config('filesystems.disks.cloudinary.url'); // cloudinary://key:secret@cloud_name
        $parsed = parse_url($url);
        return [
            'cloud_name' => $parsed['host'],
            'api_key'    => $parsed['user'],
            'api_secret' => urldecode($parsed['pass']),
        ];
    }

    private function cloudinarySign(array $params, string $apiSecret): string
    {
        ksort($params);
        $parts = [];
        foreach ($params as $key => $value) {
            $parts[] = $key . '=' . $value;
        }
        return sha1(implode('&', $parts) . $apiSecret);
    }

    private function cloudinaryUpload(string $filePath, string $folder): string
    {
        $creds     = $this->cloudinaryCredentials();
        $timestamp = time();
        $signParams = ['folder' => $folder, 'timestamp' => $timestamp];
        $signature  = $this->cloudinarySign($signParams, $creds['api_secret']);

        $response = Http::timeout(120)
            ->attach('file', file_get_contents($filePath), basename($filePath))
            ->post("https://api.cloudinary.com/v1_1/{$creds['cloud_name']}/image/upload", [
                'api_key'   => $creds['api_key'],
                'timestamp' => $timestamp,
                'folder'    => $folder,
                'signature' => $signature,
            ]);

        if (!$response->successful()) {
            throw new \RuntimeException('Cloudinary upload failed: ' . $response->body());
        }

        return $response->json('secure_url');
    }

    private function cloudinaryDestroy(string $publicId): void
    {
        $creds      = $this->cloudinaryCredentials();
        $timestamp  = time();
        $signParams = ['public_id' => $publicId, 'timestamp' => $timestamp];
        $signature  = $this->cloudinarySign($signParams, $creds['api_secret']);

        Http::timeout(30)->post(
            "https://api.cloudinary.com/v1_1/{$creds['cloud_name']}/image/destroy",
            [
                'api_key'   => $creds['api_key'],
                'timestamp' => $timestamp,
                'public_id' => $publicId,
                'signature' => $signature,
            ]
        );
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

