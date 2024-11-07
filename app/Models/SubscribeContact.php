<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeContact extends Model
{
    use HasFactory;
    protected $table = 'subscribecontacts';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'subject', 'note'];
}
