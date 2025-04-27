<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    // SubCategory model এ
public function Subcategory()
{
    return $this->belongsTo(Category::class);
}


    protected $fillable = [
        'category_name',
        'category_slug',
        'photo',
        'status',
    ];

}
