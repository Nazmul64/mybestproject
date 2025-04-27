<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_name',
        'discount_percentage',
        'validity',
        'end_date',
        'limit',
    ];

   
}
