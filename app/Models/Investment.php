<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'historic_yield',
        'total_assets',
        'min_investment',
        'investors',
        'image',
        'status'
    ];


    public function userInvestments()
{
    return $this->hasMany(UserInvestment::class);
}

}
