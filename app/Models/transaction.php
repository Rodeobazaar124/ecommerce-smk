<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    // each transaction table has user id but the user doesnt have transaction_id;
    // each transaction table has product id but the product doesnt have transaction_id;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
