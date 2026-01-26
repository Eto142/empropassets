<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'user_id',
        'cash_balance',
        'total_invested',
        'total_returns',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
