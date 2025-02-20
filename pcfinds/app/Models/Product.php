<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'product_id'; // Declare the custom primary key if necessary


    protected $fillable = [
        'product_name',
        'quantity',
        'retail_price',
        'selling_price',
        'date_added',
        'quantity_sold',
        'category_id',
        'image',
<<<<<<< HEAD
        'description',
    ];

    //         'product_name',
//         'retail_price',
//         'selling_price',
//         'date_added',
//         'category_id',
//         'quantity',
//         'image',
//         'description',
//     ];
=======
        'description', ];

        //         'product_name',
        //         'retail_price',
        //         'selling_price',
        //         'date_added',
        //         'category_id',
        //         'quantity',
        //         'image',
        //         'description',
    ];
>>>>>>> 9238bfa2395eed16c45984b468468dd8e726cafe

    // No need to include 'product_id' in $fillable

    public $timestamps = false; // Or true depending on your use of 'created_at' and 'updated_at'

    protected $casts = [
        'date_added' => 'date',
    ];

    // In Product.php (Model)

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

}
