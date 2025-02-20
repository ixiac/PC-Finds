<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Account;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false; // Since you don't have timestamps

    protected $fillable = [
        'id', // Account ID (Foreign Key)
        'product_id', // Product ID (Foreign Key)
        'quantity'
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relationship with Account
    public function account()
    {
        return $this->belongsTo(Account::class, 'id');
    }
}
