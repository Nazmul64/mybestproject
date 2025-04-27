<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing_detail extends Model
{
    protected $fillable =[
        'order_summery_id',
        'customer_name',
        'customer_area',
        'customer_address',
        'customer_phone',
        'customer_note',
        'order_date',
        'user_id',
        'guest_id', 
    ];
}
