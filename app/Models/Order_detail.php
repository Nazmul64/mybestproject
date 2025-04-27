<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = [
        'order_summery_id',
        'product_id',
        'product_size',
        'product_color',
        'amount',
    ];

}
