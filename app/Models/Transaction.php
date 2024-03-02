<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
    ];

    /**
     * Get the order that owns the Transaction
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product that owns the Transaction
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
