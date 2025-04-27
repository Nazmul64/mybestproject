<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_summery extends Model
{
    protected $fillable = [
        'shipping_id',
        'coupon_name',
        'subtotal',
        'discount_total',
        'delivery_charge',
        'total_price',
        'user_id',
        'guest_id',
        'product_size',
        'product_color',
    ];

}
