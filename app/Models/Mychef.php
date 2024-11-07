<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyChef extends Model
{
    use HasFactory;

    protected $table = 'mychefs'; // Name of the table
    protected $primaryKey = 'id'; // Primary key

    // Allow mass assignment for name, image, and description
    protected $fillable = ['name', 'image', 'description'];
}
