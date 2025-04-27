<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incompleate_order extends Model
{
    protected $fillable = [
        'user_id',
        'session_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'shipping_id',
        'note',
        'subtotal',
        'shipping_charge',
        'coupon_discount',
        'coupon_name',
        'total_price',
    ];
}

