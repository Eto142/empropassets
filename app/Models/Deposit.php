<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    // Table name (optional if your table is 'deposits')
    protected $table = 'deposits';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'crypto_type',
        'bank_name',
        'account_number',
        'proof',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: status helper
    public function isPending()
    {
        return $this->status === 0;
    }

    public function isApproved()
    {
        return $this->status === 1;
    }

    public function isRejected()
    {
        return $this->status === 2;
    }
}
