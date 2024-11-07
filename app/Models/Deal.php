<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = ['product_id', 'discount', 'frequency','total_use','discount_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('date', 'usage_count')->withTimestamps();
    }
}
