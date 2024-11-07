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
        'total_order_days',
        'gift_awarded',
    ];

    protected $casts = [
        'order_date' => 'date', // Ensure order_date is cast to a Carbon instance
        'gift_awarded' => 'boolean',
    ];

        // Define the relationship with the User model
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
