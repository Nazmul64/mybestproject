<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $fillable = [
        'product_id', 'product_color', 'product_size', 'amount', 'user_id', 'guest_id'
    ];

}
