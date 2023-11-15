<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'category_name',
        'name',
        'code',
        'images',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'tags',
        'unit',
        'hot_deal',
        'featured',
        'popular_product',
        'status',
    ];

    use HasFactory;
}

