<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public $timestamps = false; // Since you're using 'date_created'

    protected $hidden = [
        'password', 
        'remember_token', // Hide sensitive data
    ];
}
