<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'withdrawal_type',
        'amount',
        'bank_name',
        'account_name',
        'account_number',
        'swift_code',
        'crypto_network',
        'wallet_address',
        'narration',
        'status',
    ];

    /**
     * Get the user who made this withdrawal.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
