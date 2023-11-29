<?php

namespace App\Models\Frontend;

use App\Models\Admin\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = [
        'name',
        'email',
        'comment',
        'blog_id',
        'user_id'
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
