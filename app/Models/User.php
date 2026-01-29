<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
         'name', 'email', 'password',
    'phone', 'address', 'country', 'dob',
    'otp', 'otp_expires_at', 'email_verified_at',
    'identity_type', 'identity_document', 'identity_document_back',
    'kyc_status', 'kyc_rejection_reason', 'kyc_verified_at',
    'bank_name', 'account_name', 'account_number', 'swift_code', 'bank_description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'kyc_verified_at' => 'datetime',
        ];
    }

    public function investments()
{
    return $this->hasMany(UserInvestment::class);
}

public function balance()
{
    return $this->hasOne(Balance::class);
}



}
