<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winter extends Model
{
    use HasFactory;
    protected $table = 'winters';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'subtitle','image'];
}
