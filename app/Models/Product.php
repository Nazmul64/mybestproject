<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class); 
    }
    

    protected $fillable = [
        'title', 'product_name', 'product_id', 'product_description',
        'product_details_description',  'product_slug',
        'regular_price', 'sale_price', 'video_url', 'stock_title', 'stock','photo',
        'is_published', 'is_advertise',
        'category_id', 'subcategory_id',
        'new_photo', 'new_gallery_image',
        'size_description' => 'array',
        'color_text' => 'array',
        'ips_items',
        'ips_price',
        'gallery_image',
        'is_active',
        'multiple_name',
        'status',
        'discount_percentage',
        
    ];
}
