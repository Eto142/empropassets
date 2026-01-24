<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'investment_id',
        'name',
        'type',
        'historic_yield',
        'total_assets',
        'min_investment',
        'image',
        'status',
    ];

    /**
     * Relationship: Investment belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Snapshot of the original investment
     */
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
