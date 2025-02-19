<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    protected $table = 'order_history';
    protected $primaryKey = 'order_history_id';
    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'date_order_history',
        'total_amount',
        'order_status',
        'shipping_address'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_history_id', 'order_history_id');
    }
}
