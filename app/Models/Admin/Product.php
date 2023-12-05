<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use App\Models\Admin\ProductImage;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Review;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'category_id',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}

