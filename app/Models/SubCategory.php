<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    protected $fillable = [
        'subcategory_name',
        'category_id',
        'subcategory_slug',
        'sub_photo',
        'new_sub_photo',
        'status',
    ];
}
