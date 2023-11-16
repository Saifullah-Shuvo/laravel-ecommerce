<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Category extends Model
{
    protected $table = "categories";
    
    protected $fillable = [
        'category_name',
        'category_image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
