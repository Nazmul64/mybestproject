<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shippingmethod extends Model
{
    protected $fillable =[
        'type',
        'shipping_cost',
        'is_active',
    ];
}
