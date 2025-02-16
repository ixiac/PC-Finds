<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';

    protected $fillable = [
        'username',
        'password',
        'role',
        'first_name',
        'last_name',
        'email',
        'sex',
        'contact_number',
        'address',
        'date_created',
        'image'
    ];

    public $timestamps = false; // Because we are using 'date_created'
}

