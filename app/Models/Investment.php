<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_type',
        'type',
        'name',
        'location',
        'historic_yield',
        'total_assets',
        'sale_price',
        'min_investment',
        'share_price',
        'investors',
        'size',
        'bedrooms',
        'bathrooms',
        'parking',
        'year_built',
        'description',
        'amenities',
        'gallery',
        'image',
        'status'
    ];

    /**
     * Cast amenities and gallery to arrays automatically
     */
    protected $casts = [
        'amenities' => 'array',
        'gallery' => 'array',
    ];

    /**
     * Relationship with user investments
     */
    public function userInvestments()
    {
        return $this->hasMany(UserInvestment::class);
    }
}
