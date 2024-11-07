<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summer extends Model
{
    use HasFactory;

    protected $table = 'summers';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'subtitle', 'image',];
}
