<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'account_logs';

    protected $fillable = [
        'id', // Foreign key from `account` table
        'activity',
        'updated_at',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'id', 'id'); 
    }

}

