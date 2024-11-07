<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'discount_amount',
        'total_use',
        'max_users',
        'max_user_uses',
        'min_amount',
        'status',
        'start_at',
        'expires_at',
        'description'
    ];

    protected $dates = ['start_at', 'expires_at'];

    // Relationship to CouponUse
    public function uses()
    {
        return $this->hasMany(CouponUse::class);
    }

    // Relationship to get user's uses of the coupon
    public function userUses($userId)
    {
        return $this->hasMany(CouponUse::class)->where('user_id', $userId);
    }





}

