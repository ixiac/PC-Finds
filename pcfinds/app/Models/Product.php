<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name', 
        'quantity', 
        'retail_price', 
        'selling_price', 
        'date_added', 
        'date_restocked', 
        'category_id', 
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
