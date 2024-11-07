<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;
    protected $table = 'usercontacts';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone','subject', 'note'];
}
