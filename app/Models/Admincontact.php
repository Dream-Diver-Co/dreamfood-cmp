<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admincontact extends Model
{
    use HasFactory;

    protected $fillable = [
        'map', 'address', 'email', 'phone', 
    ];
}
