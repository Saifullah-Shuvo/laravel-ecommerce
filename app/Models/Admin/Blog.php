<?php

namespace App\Models\Admin;

use App\Models\Admin;
use App\Models\Frontend\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";

    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }


}
