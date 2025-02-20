<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'product'; // Explicitly define table name

    protected $primaryKey = 'product_id'; // Define primary key

    public $timestamps = false; // Disable timestamps if not present

    protected $fillable = ['product_name', 'quantity', 'quantity_sold']; // Allow mass assignment

    protected $casts = [
        'quantity' => 'integer',
        'quantity_sold' => 'integer',
    ];

    // Computed Attribute for Remaining Stock
    public function getRemainingStockAttribute()
    {
        return max(0, $this->quantity - $this->quantity_sold); // Avoid negative values
    }
}
