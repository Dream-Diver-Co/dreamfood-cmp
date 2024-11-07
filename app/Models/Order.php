<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Order extends Model
{
    use HasFactory, HasUuids;

    // Specify the key type as string because UUIDs are strings
    protected $keyType = 'string';

    // Disable auto-incrementing as UUIDs are not incrementing
    public $incrementing = false;

    // Specify the fillable attributes
    protected $fillable = [
        'id', // Make sure 'id' is fillable for UUID
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
        'payment_method',
        'first_name',
        'last_name',
        'email',
        'mobile_no',
        'address_line1',
        'address_line2',
        'country',
        'city',
        'state',
        'zip_code',
        'cashback_amount',
    ];

    // Define the relationship between Order and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship between Order and OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }





}
