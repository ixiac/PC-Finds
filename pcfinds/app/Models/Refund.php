<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $table = 'refunds';
    protected $primaryKey = 'refund_id';

    public $timestamps = false;
    protected $fillable = [
        'order_history_id',
        'account_id',
        'refund_amount',
        'refund_reason',
        'refund_image',
        'refund_status',
        'refund_date',
    ];

    // Relationship with OrderHistory
    public function order()
    {
        return $this->belongsTo(OrderHistory::class, 'order_history_id', 'order_history_id');
    }

    // Relationship with Account
    public function account()
    {
        return $this->belongsTo(User::class, 'account_id', 'id');
    }
}
