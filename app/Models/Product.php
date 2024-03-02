<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image', 'stock'];

    /**
     * The orders that belong to the Product
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * The carts that belong to the Product
     */
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }

    /**
     * Get all of the transactions for the Product
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
