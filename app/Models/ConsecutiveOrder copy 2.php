<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsecutiveOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'order_date',
        'order_date_2',  // Added additional order date 1
        'order_date_3',  // Added additional order date 2
        'order_date_4',  // Added additional order date 3
        'order_date_5',  // Added additional order date 4
        'order_date_6',  // Added additional order date 5
        'order_date_7',  // Added additional order date 6
        'total_order_days',
        'gift_awarded',
    ];

    protected $casts = [
        'order_date' => 'date',  // Ensure order_date is cast to a Carbon instance
        'order_date_2' => 'date', // Cast additional order date 1 to Carbon
        'order_date_3' => 'date', // Cast additional order date 2 to Carbon
        'order_date_4' => 'date', // Cast additional order date 3 to Carbon
        'order_date_5' => 'date', // Cast additional order date 4 to Carbon
        'order_date_6' => 'date', // Cast additional order date 5 to Carbon
        'order_date_7' => 'date', // Cast additional order date 6 to Carbon
        'gift_awarded' => 'boolean',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
