<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefContact extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'chefcontacts';

    // Set the primary key
    protected $primaryKey = 'id';

    // Fields that are mass assignable
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'note',
        'image',
        'address',  
        'date',
        'time',
        'event_name',
        'chef_name',
    ];
}
