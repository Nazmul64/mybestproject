<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whilist extends Model
{
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
     protected $fillable = ['product_id', 'product_size', 'product_color', 'user_id', 'guest_id'];

}
